<?php
/**
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Acemero Technologies Pvt Ltd
 * @link https://www.acemero.com
 * @see https://www.hybridmlm.io
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Blueprint\Services;

use App\Blueprint\Support\Collection;
use App\Blueprint\Support\Tasks\Operation;
use App\Blueprint\Support\Tasks\Task;
use App\Eloquents\Task as TaskModel;
use Closure;
use Illuminate\Support\Facades\Redis;


/**
 * Class TaskServices
 * @package App\Blueprint\Services
 */
class TaskServices
{
    static $tasks = [];

    /**
     * @param $taskAttributes
     * @param Closure $task
     * @return Task
     */
    function createTask($taskAttributes, Closure $task = null)
    {
        return (Task::getInstance(false, $taskAttributes)->taskUpdate());
    }

    /**
     * @param $tasks
     * @param null $type
     * @return mixed
     */
    function totalOperations($tasks, $type = null)
    {
        return collect($tasks)->reduce(function ($carry, $task) use ($type) {
            /** @var Task $task */
            return $carry + $task->getOperations()->filter(function ($operation) use ($type) {
                    if ($type) /** @var Operation $operation */
                        return $operation->getStatus() == $type;
                    return true;
                })->count();
        });
    }

    /**
     * @param array $filters
     * @return array|Collection
     */
    function getTasks($filters = [])
    {
        $filters = collect([])->merge($filters);

        return $this->resolveTasks()->filter(function ($task) use ($filters) {
            foreach ($filters->all() as $key => $filter) {
                if ($filter instanceof Closure) {
                    if (!$filter($task)) return false;
                } else if (is_array($filter)) {
                    if (!dynamicCompare($task->{$key}, $filter[0], $filter[1])) return false;
                } else
                    return $task->{$key} == $filter;
            }

            return true;
        });
    }

    /**
     * @return array|Collection
     */
    function resolveTasks()
    {
        return collect(Redis::hgetall('tasks'))->map(function ($task) {
            return unserialize($task);
        })->sortBy(function ($task, $id) {
            /** @var Task $task */
            return $task->startedAt;
        }, null, true)->filter(function ($task) {
            return ($task instanceof Task);
        });
    }

    /**
     * @param $taskId
     * @return mixed|Task
     */
    function resolveTask($taskId)
    {
        if (Redis::HEXISTS('tasks', $taskId))
            return unserialize(Redis::hget('tasks', $taskId));

        return $this->buildTaskDataFromDb($taskId);
    }

    /**
     * @param $taskId
     * @return bool
     * @throws \Exception
     */
    function deleteTask($taskId)
    {
        Redis::hdel('tasks', $taskId);
        TaskModel::where('task_id', $taskId)->delete();

        return true;
    }

    /**
     * @param $taskId
     * @return bool
     */
    function buildTaskDataFromDb($taskId)
    {
        if (!$taskModel = TaskModel::where('task_id', $taskId)->first())
            return false;

        return tap(Task::getInstance($taskId, [
            'taskName' => $taskModel->name,
            'taskDescription' => $taskModel->description,
            'startedAt' => $taskModel->started_at,
        ]), function ($task) use ($taskModel) {
            /** @var Task $task */
            $task->done(true)
                ->setFailedJobs($taskModel->failed)
                ->setSuccessJobs($taskModel->success);
        });
    }

    /**
     * @return bool
     */
    function flushRedisTasks()
    {
        foreach (Redis::hgetall('tasks') as $key => $task) Redis::hdel('tasks', $key);

        return true;
    }
}
