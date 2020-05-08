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
/*        if($request->has('category')) {
            $jobs->whereHas('categories', function(Builder $query) use ($request){
                $query->where('name', 'like', $request->category);
            });
        }

        if($request->has('contract')) {
            $jobs->where('contract_type', $request->contract);
        }


    $jobs->whereBetween('experiences_number', [2, 3]);


    $jobs->where('categories.name', 'like', '%Design');

*/

        $jobs->whereHas('categories', function(Builder $query) use ($request){
            $query->where('name', 'like', 'Design%');
        })->get();

        return JobResource::collection(
            $jobs->paginate(self::PER_PAGE)
        );
        //return $jobs->get();
    }
}
