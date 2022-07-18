<?php

use Illuminate\Support\Str;

define("PAGELISTE", "liste");
define("PAGEAJOUTER", "ajouter");
define("PAGEEDIT", "editer");
define("PAGEBENEF", "beneficiaire");
define("PAGEDETAIL", "detail");

function getProfilsName()
{
    $profilsName = "";
    $i = 0;
    foreach (auth()->user()->profils as $profil) {
        $profilsName .= $profil->nom;

        if ($i == sizeof(auth()->user()->profils) - 1) {
            $profilsName .= ",";
        }

        $i++;
    }
    return $profilsName;
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
