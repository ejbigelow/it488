<?php
/*Navbar highlighter*/
/*Array to test input*/
$pages = array(
    "home",
    "about",
    "privacy",
    "catalogue",
    "events"
);
$found = 0;
if (isset($_GET['page'])) {
    foreach ($pages as $page) {
        if (substr_count($pages,$page == 1)) {
        }
        else {
            unset($page);
            header('location: index.php');
        }
    }
    $page=$_GET['page'];
    switch($page) {
        /* Display About page */
        case about:
            $home = "<li>";
            $about = "<li class=\"active\">";
            $contact = "<li>";
            $privacy = "<li>";
            $catalogue = "<li>";
            $events = "<li>";
            $help="<li>";
            $title = "About";
            break;
        case Contact:
            $home = "<li>";
            $about = "<li>";
            $contact = "<li class=\"active\">";
            $privacy = "<li>";
            $catalogue = "<li>";
            $events = "<li>";
            $help="<li>";
            break;
        case privacy;
            $home = "<li>";
            $about = "<li>";
            $contact = "<li>";
            $privacy="<li class=\"active\">";
            $catalogue = "<li>";
            $events = "<li>";
            $help="<li>";
            break;
        case catalogue;
            $home = "<li>";
            $about = "<li>";
            $contact = "<li>";
            $privacy="<li>";
            $catalogue="<li class=\"active\">";
            $events = "<li>";
            $help="<li>";
            break;
        case prayers;
            $home = "<li>";
            $about = "<li>";
            $contact = "<li>";
            $privacy="<li>";
            $catalogue = "<li>";
            $events = "<li>";
            $help="<li>";
            break;
        case events;
            $home = "<li>";
            $about = "<li>";
            $contact = "<li>";
            $privacy = "<li>";
            $catalogue = "<li>";
            $events="<li class=\"active\">";
            $help="<li>";
            break;
        case help;
            $home = "<li>";
            $about = "<li>";
            $contact = "<li>";
            $privacy = "<li>";
            $catalogue = "<li>";
            $events="<li>";
            $help="<li class=\"active\">";

            break;
        /*default*/
        default:
            $home = "<li class=\"active\">";
            $about = "<li>";
            $contact = "<li>";
            $privacy = "<li>";
            $catalogue = "<li>";
            $events = "<li>";
            $help="<li>";
    }
}
else {
    $home= "<li class=\"active\">";
    $about = "<li>";
    $contact = "<li>";
    $privacy = "<li>";
    $catalogue = "<li>";
    $events = "<li>";
    $help="<li>";
}

?>
