<?php

function check_permission($request, $actionName = NULL, $id = NULL)
{
    // Current User
    $currentUser = $request->user();

    if ($actionName) {
        $currentActionName = $actionName;
    } else {
        $currentActionName = class_basename(Route::getCurrentRoute()->action['uses']);
    }

    // get route yang telah di akses dan methodnya
    list($controller, $method) = explode('@', $currentActionName);
    $controller = str_replace('Controller', '', $controller);
    $routes = strtolower($controller);

    $crudPermissionMap = [
        'crud' => ['create','store','edit','update','destroy','restore','forceDestroy','index','export','view']
    ];

    foreach (config('developer') as $module) $classesMap[$module['parent']] = $module['route']; 

    foreach ($crudPermissionMap as $permission => $methods) {
        if (in_array($method, $methods) && isset($classesMap[$controller])) {
            $className = $classesMap[$controller];

            if ($className == 'post' && in_array($method, ['edit','update','destroy','restore','forDestroy'])) {
                // jika user tidak punya permission update other dan delete other
                // dia hanya bisa edit dan delete tulisannya sendiri
                // dd($currentUser->can("update-other-{$className}"));
                $id = !is_null($id) ? $id : $request->route("blog");
                if( $id  && (!$currentUser->can("update-other-{$className}") || !$currentUser->can("delete-other-{$className}")) ) 
                {
                    $post = \App\Post::withTrashed()->find($id);
                    if ($post->user_id !== $currentUser->id) {
                        return false;
                    }
                }
            }
            // jika user tidak punya permisi tidak boleh lewat
            else if (! $currentUser->can("{$permission}-{$className}")) {
                return false;
            }
            break;
        }
    }

    return true;
}