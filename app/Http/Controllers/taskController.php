<?php

namespace App\Http\Controllers;

use App\Models\docs_task;
use App\Models\tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class taskController extends Controller
{
    public function taskList()
    {
        $userId = auth()->id();
        $userTask = tasks::where('user_id', $userId)->get();

        return view('tasks.tasksList', compact('userTask'));
    }
    public function indxTaskList()
    {
        $userId = auth()->id();

        $query = tasks::where('state', 0)->where('user_id', $userId);

        $conteos = $query->selectRaw('
            SUM(priority_id = 1) as urgente,
            SUM(priority_id = 2) as alta,
            SUM(priority_id = 3) as media,
            SUM(priority_id = 4) as baja')->first();

        return view('tasks.indxTasks', compact('conteos'));
    }

    public function taskR(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'priority' => 'required',
            'date_vic' => 'required',
            'description' => 'string|max:255',
        ]);

        $userId = auth()->id();

        $task = tasks::create([
            'user_id' => $userId,
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->date_vic,
            'priority_id' => $request->priority,
        ]);

        if ($task) {
            $title = '¡Éxito!';
            $desc = 'Tarea registrada correctamente.';
            $icon = 'success';
        } else {
            $title = 'Atención';
            $desc = 'No se pudo crear la tarea, intente nuevamente.';
            $icon = 'warning';
        }
        return redirect()->route('taskList')->with('alerta', [
            'titulo' => $title,
            'mensaje' => $desc,
            'icono' => $icon,
            'confirmarTexto' => 'Entendido',
            'mostrarCancelar' => false
        ]);
    }
    private function uploadDocument($req)
    {

        $taskId = $req->task_id;

        $files = $req->file('document');
        $folderName = 'TaskDocs';
        $subfolder = $taskId;

        foreach ($files as $file) {
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $shortName = Str::slug(Str::limit($originalName, 20, '')) . '-' . uniqid() . '.' . $extension;

            $file->storeAs("{$folderName}/{$subfolder}", $shortName, 'public');

            $taskDoc = docs_task::create([
                'task_id' => $taskId,
                'name_doc' => $shortName,
                'path' => $folderName . '/' . $subfolder . '/',
            ]);
        }

        return $taskDoc;
    }

    public function taskE(Request $request)
    {
        $request->validate([
            'task_id' => 'required',
            'document' => 'required|array',
            'document.*' => 'file|mimes:jpeg,png,jpg,pdf'
        ]);

        $task = tasks::where('id', $request->task_id)->first();

        $this->uploadDocument($request);

        if ($this) {
            $taskU = $task->update([
                'state' => 1
            ]);
        }

        if ($taskU) {
            $title = '¡Éxito!';
            $desc = 'Tarea modificada correctamente.';
            $icon = 'success';
        } else {
            $title = 'Atención';
            $desc = 'No se pudo modificar la tarea, intente nuevamente.';
            $icon = 'warning';
        }
        return redirect()->route('taskList')->with('alerta', [
            'titulo' => $title,
            'mensaje' => $desc,
            'icono' => $icon,
            'confirmarTexto' => 'Entendido',
            'mostrarCancelar' => false
        ]);
    }
    public function taskV($id)
    {
        $task = tasks::findOrFail($id);
        $docs = docs_task::where('task_id', $id)->get();
        $val = 0;

        if ($docs) {
            $val = 1;
        }

        return view('tasks.tasksView', compact('task', 'docs', 'val'));
    }
}
