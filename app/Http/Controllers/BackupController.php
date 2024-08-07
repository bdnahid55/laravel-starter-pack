<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class BackupController extends Controller
{

    // Create new backup file
    public function create()
    {
		// for only file backup: if (Artisan::call('backup:run --only-files') == 0) {
        // full backup with database: if (Artisan::call('backup:run') == 0) {
        if (Artisan::call('backup:run --only-files') == 0) {
            $notification = array(
                'message' => 'Backup created successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Backup failed.',
                'alert-type' => 'error'
            );
        }
        return Redirect()->route('admin.backup.all-backup')->with($notification);
    }

    // all backup index page
    public function index()
    {
        $path = public_path('backups/laravel');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        $backups = File::allFiles($path);
        return view('back.pages.backup.index', compact('backups'));
    }

    // clear old backup files
    public function destroy()
    {
        if (Artisan::call('backup:clean') == 0) {
            $notification = array(
                'message' => 'Old Backup deleted successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Old Backup delete failed.',
                'alert-type' => 'error'
            );
        }
        return Redirect()->route('admin.backup.all-backup')->with($notification);
    }

    // delete all backup files
    public function delete()
    {
        $files = File::allFiles(public_path('/backups/laravel/'));
        // print_r($files);exit();
        foreach ($files as $file) {
            $fileDeleted = File::delete(public_path('/backups/laravel/'.$file->getFilename()));
        }

        if ($fileDeleted) {
            $notification = array(
                'message' => 'All Backup deleted successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Failed to delete all Backup.',
                'alert-type' => 'error'
            );
        }
        return Redirect()->route('admin.backup.all-backup')->with($notification);

    // End
    }
// End
}
