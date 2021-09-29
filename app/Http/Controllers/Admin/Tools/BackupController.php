<?php

namespace App\Http\Controllers\Admin\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tool\BackupRequest;
use BackupManager\Filesystems\Destination;
use BackupManager\Manager;
use Illuminate\Support\Facades\File;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BackupRequest $request)
    {
          $manager  = app()->make(Manager::class);
          $fileName = $request->get('file_name') ?: date('d-m-Y_Hi');
          $manager->makeBackup()->run('mysql',[
              new Destination('local', 'backup/db/'.$fileName),
          ], 'gzip');

          return redirect()->route('admin.backups.index')->with('Success', __('Backup Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paths = 'app/backup/db';
        if (!file_exists(storage_path('app/backup/db'))) {
             $backups = [];
        } else {
            $backups = File::allFiles(storage_path($paths));
            usort($backups, function ($a, $b) {
                return -1* strcmp($a->getMTime(), $b->getMTime());
            });
        }

        return view('admin.backup.index', compact('backup'));
    }





    public function download($fileName)
    {
        return response()->download(storage_path('app/backup/db/').$fileName);
    }

    public function restore($fileName)
    {
        $manager = app()->make(Manager::class);
        $manager->makeRestore()->run('local', 'backup/db/'.$fileName, 'mysql','gzip');
        return redirect()->route('admin.backups.index')->with('Success', __('Backup Successfully Restored'));
    }

     public function upload(Request $request)
     {
         $file = $request->file('backup_file');
         if (file_exists(storage_path('app/backup/db/').$file->getClientOriginalName()) == false) {
            $file->storeAs('backup/db', $file->getClientOriginalName());
        }
        return redirect()->route('admin.backups.index')->with('Success', __('Backup Successfully Uploaded'));

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($fileName)
    {

        if (file_exists(storage_path('app/backup/db/').$fileName)) {
            unlink(storage_path('app/backup/db/').$fileName);
        }

        return redirect()->route('admin.backups.index')->with('Success', __('Backup Successfully Deleted'));
    }
}
