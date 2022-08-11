<?php

use Illuminate\Support\Str;

define("PAGELISTE", "liste");
define("PAGEAJOUTER", "ajouter");
define("PAGEEDIT", "editer");

function getProfilsName()
{
    $rolesName = "";
    $i = 0;
    foreach (auth()->user()->role as $role) {
        $rolesName .= $role->nom;

        if ($i < sizeof(auth()->user()->role) - 1) {
            $rolesName .= ",";
        }

        $i++;
    }
    return $rolesName;
}

function getMutuelle()
{
    return auth()->user()->mutuelle->nom;
}

function setMenuClass($route, $classe)
{
    $routeActuel = request()->route()->getName();
    if (contains($routeActuel, $route)) {
        return $classe;
    }
    return "";
}

function setMenuActive($route)
{
    $routeActuel = request()->route()->getName();
    if ($routeActuel === $route) {
        return "active";
    }
    return "";
}

function contains($container, $contenu)
{
    return Str::contains($container, $contenu);
}
