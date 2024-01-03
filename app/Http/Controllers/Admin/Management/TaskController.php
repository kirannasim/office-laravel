<?php
/**
 * Created by PhpStorm.
 * User: Muhammed Fayis
 * Date: 10/26/2018
 * Time: 10:49 PM
 */

namespace App\Http\Controllers\Admin\Management;


use App\Blueprint\Services\TaskServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * @param TaskServices $services
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index(TaskServices $services)
    {
        //$services->flushRedisTasks();
        $data = [
            'tasks' => $tasks = $services->resolveTasks(),
            'totalTasks' => count($tasks),
            'totalOperations' => $services->totalOperations($tasks),
            'totalFailedOperations' => $services->totalOperations($tasks, 'failed'),
            'totalPendingOperations' => $services->totalOperations($tasks, 'pending'),
            'totalSuccessOperations' => $services->totalOperations($tasks, 'success'),
            'scripts' => [
                asset('global/plugins/select2/js/select2.full.min.js'),
            ],
            'styles' => [
                asset('global/plugins/select2/css/select2-bootstrap.min.css'),
                asset('global/plugins/select2/css/select2.min.css'),
            ]
        ];

        return view('Admin.Management.Tasks.index', $data);
    }

    /**
     * @param Request $request
     * @param TaskServices $taskServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getTasks(Request $request, TaskServices $taskServices)
    {
        $data = [
            'tasks' => $tasks = $taskServices->getTasks($request->input('filters'))->all(),
            'totalTasks' => count($tasks),
            'containerId' => randomString(15),
            'includeHeader' => (bool)$request->input('includeHeader', true)
        ];

        return view('Admin.Management.Tasks.tasks', $data);
    }

    /**
     * @param Request $request
     * @param TaskServices $services
     * @return bool|\Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function deleteTask(Request $request, TaskServices $services)
    {
        $this->validate($request, [
            'taskId' => 'required'
        ]);

        try {
            $services->deleteTask($request->input('taskId'));
            return response('success');
        } catch (\Exception $e) {
            return response("failed {$e->getMessage()}", 500);
        }
    }

    /**
     * @param Request $request
     * @param TaskServices $taskServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function operationHistory(Request $request, TaskServices $taskServices)
    {
        $data = [
            'task' => $task = $taskServices->resolveTask($request->input('taskId')),
            'histories' => $task->getOperationsByStatus(['failed', 'success'])
        ];

        return view('Admin.Management.Tasks.Partials.operations', $data);
    }

    /**
     * @param Request $request
     * @param TaskServices $taskServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function operationData(Request $request, TaskServices $taskServices)
    {
        $data = [
            'task' => $task = $taskServices->resolveTask($request->input('taskId')),
            'operation' => $task->currentOperation(),
        ];

        return view('Admin.Management.Tasks.Partials.operation', $data);
    }

    /**
     * @param Request $request
     * @param TaskServices $taskServices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getTask(Request $request, TaskServices $taskServices)
    {
        $data = [
            'task' => $taskServices->resolveTask($request->input('taskId'))
        ];

        return view('Admin.Management.Tasks.Partials.task', $data);
    }
}