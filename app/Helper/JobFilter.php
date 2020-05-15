<?php


namespace App\Helper;


use App\Http\Resources\Job as JobResource;
use App\Models\Job;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            } else if(sizeof(explode(',', $request->experience)) > 1){
                $jobs->whereBetween('experiences_number', explode(',', $request->experience));
            } else return null;
        }

        if($request->has('posted_date')) {
            switch($request->posted_date) {
                case 'Today': $jobs->where('postedDate', now(), '<=');
                    break;
                case 'Last 2 days': $jobs->where('postedDate', '=', now()->subDays(2), '<=');
                    break;
                case 'Last 3 days': $jobs->where('postedDate', now()->subDays(3), '<=');
                    break;
                case 'Last 5 days': $jobs->where('postedDate', now()->subDays(5), '<=');
                    break;
                case 'Last 10 days': $jobs->where('postedDate', now()->subDays(12), '<=');
                    break;
                default: return null;
            }
        }

        return JobResource::collection(
            $jobs->paginate(self::PER_PAGE)
        );
        //return $jobs->get();
    }
}
