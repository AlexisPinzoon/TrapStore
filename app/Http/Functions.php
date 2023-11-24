<?php

function getSectionArray(){
    $a =[
        '0' => ' Productos ',
        '1' => ' Blog '
    ];
    return $a;
}

function getRoleUserArray($mode,$id){
    $roles = ['0' => 'Usuario', '1' => 'Administrador'];
    if(!is_null($mode)):
        return $roles;
    else:
        return $roles[$id];
    endif;
}

function getUserStatusArray($mode,$id){
    $status = ['0'=> 'Registrado', '100' => 'Baneado'];
    if(!is_null($mode)):
        return $status;
    else:
        return $status[$id];
    endif;
}
