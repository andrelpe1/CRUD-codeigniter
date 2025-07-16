<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    private $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    public function index()
    {
        return view('tasks/index', [
            'tasks' => $this->taskModel->paginate(10),
            'pager' => $this->taskModel->pager, ]);
    }

    public function delete($id)
    {
        if ($this->taskModel->delete($id)) {
            return redirect()->to('tasks/index?alert=sucessDelete');
        }

        return redirect()->to('tasks/index?alert=errorDelete');
    }

    public function create()
    {
        return view('tasks/create');
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[3]',
            'description' => 'required|min_length[5]',
            'status' => 'required|in_list[pendente,em andamento,concluída]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                             ->withInput()
                             ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        if ($this->taskModel->insert($data)) {
            return redirect()->to('/tasks/index?alert=sucessCreate');
        }

        return redirect()->to('/tasks/index?alert=errorCreate');
    }

    public function edit($id)
    {
        return view('tasks/edit', [
            'task' => $this->taskModel->find($id),
        ]);
    }

    public function update()
    {
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
        ];

        $id = $this->request->getPost('id');

        $rules = [
            'title' => 'required|min_length[3]',
            'description' => 'required|min_length[5]',
            'status' => 'required|in_list[pendente,em andamento,concluída]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                             ->withInput()
                             ->with('errors', $this->validator->getErrors());
        }

        if ($this->taskModel->update($id, $data)) {
            return redirect()->to('/tasks/index?alert=sucessUpdate');
        } else {
            return redirect()->to('/tasks/index?alert=errorUpdate');
        }
    }

    // API CONTROLLER
    public function APIlist()
    {
        $data = $this->taskModel->findAll();

        return $this->response->setJSON($data);
    }

    public function APIcreate()
    {
        $newTask['title'] = $this->request->getPost('title');
        $newTask['description'] = $this->request->getPost('description');
        $newTask['status'] = $this->request->getPost('status');

        try {
            $response = [];
            if ($this->taskModel->insert($newTask)) {
                $response = [
                    'response' => 'sucess',
                    'msg' => 'Tarefa criada com sucesso',
                ];
            } else {
                $response = [
                    'response' => 'error',
                    'msg' => 'Erro ao criar tarefa',
                    'errors' => $this->taskModel->errors(),
                ];
            }
        } catch (\Exception $e) {
            $response = [
                'response' => 'error',
                'msg' => 'Erro ao criar tarefa',
                'errors' => [
                    'exception' => $e->getMessage(),
                ],
            ];
        }

        return $this->response->setJSON($response);
    }

    public function APIupdate($id)
    {
        $updateTask = $this->request->getJSON(true);
        try {
            $response = [];
            if ($this->taskModel->update($id, $updateTask)) {
                $response = [
                    'response' => 'sucess',
                    'msg' => 'Tarefa atualizada com sucesso',
                ];
            } else {
                $response = [
                    'response' => 'error',
                    'msg' => 'Erro ao atualizar tarefa',
                    'errors' => $this->taskModel->errors(),
                ];
            }
        } catch (\Exception $e) {
            $response = [
                'response' => 'error',
                'msg' => 'Erro ao atualizar tarefa',
                'errors' => [
                    'exception' => $e->getMessage(),
                ],
            ];
        }

        return $this->response->setJSON($response);
    }

    public function APIdelete($id)
    {
        try {
            $response = [];
            if ($this->taskModel->delete($id)) {
                $response = [
                    'response' => 'sucess',
                    'msg' => 'Tarefa deletada com sucesso',
                ];
            } else {
                $response = [
                    'response' => 'error',
                    'msg' => 'Erro ao deletar tarefa',
                    'errors' => $this->taskModel->errors(),
                ];
            }
        } catch (\Exception $e) {
            $response = [
                'response' => 'error',
                'msg' => 'Erro ao deletar tarefa',
                'errors' => [
                    'exception' => $e->getMessage(),
                ],
            ];
        }

        return $this->response->setJSON($response);
    }
}
