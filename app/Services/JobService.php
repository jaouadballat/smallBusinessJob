<?php


namespace App\Services;

use App\Repositories\JobRepository\JobRepositoryInterface;

class JobService extends Service
{
    /**
     * @var JobRepositoryInterface
     */
    private $repository;

    /**
     * JobService constructor.
     * @param JobRepositoryInterface $repository
     */
    public function __construct(JobRepositoryInterface $repository)
    {
        parent::__construct($repository);

        $this->repository = $repository;
    }

    /**
     * get all records
     * @return mixed
     */
    public function all()
    {
        return $this->repository->all();
    }

    /**
     * get featured jobs
     * @return mixed
     */
    public function featuredJobs()
    {
        return $this->repository
                    ->limit(4)
                    ->orderBy('postedDate', 'desc')
                    ->get();
    }

    /**
     * find record by id
     * @param $id
     * @return mixed
     */
    public function findOne($id)
    {
        return $this->repository->with('categories')->getById($id);
    }

    /**
     * find with pagination
     * @param int $page
     * @return mixed
     */
    public function withPagination(int $page)
    {
        return $this->repository->collectionsWithPaginate($page);
    }

    /**
     * create new job
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->repository->create($data);
    }

    /**
     * update job
     * @param $data
     * @param $id
     * @return mixed|void
     */
    public function update($data, $id)
    {
        return $this->repository->update($data, $id);
    }

    /**
     * delete record
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->repository->deleteById($id);
    }


    public function getAllFreelancersForThisJob($id)
    {
        $job = $this->findOne($id);
        return $job->freelancers()->get()->unique();
    }

    public function sendMessageForThisFreelancer($data)
    {
        $job = $this->findOne($data['job_id']);
        unset($data['job_id']);

        $job->messages()->create($data);
    }
}
