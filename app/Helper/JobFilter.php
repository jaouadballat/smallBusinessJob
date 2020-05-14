<?php


namespace App\Helper;


use App\Http\Resources\Job as JobResource;
use App\Models\Job;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class JobFilter
{

    const PER_PAGE = 5;


    public static function apply(Request $request, $repository)
    {
        $jobs = $repository->newQuery();
        if($request->has('category')) {
            $jobs->whereHas('categories', function(Builder $query) use ($request){
                $query->where('name', 'like', $request->category);
            });
        }

        if($request->has('contract')) {
            $jobs->where('contract_type', $request->contract);
        }

        if($request->has('experience')) {
            if(sizeof(explode(',', $request->experience)) === 1 and (integer) $request->experience === 6) {
                $jobs->where('experiences_number', '>=', $request->experience);
            } else {
                $jobs->whereBetween('experiences_number', explode(',', $request->experience));
            }
        }

        return JobResource::collection(
            $jobs->paginate(self::PER_PAGE)
        );
        //return $jobs->get();
    }
}
