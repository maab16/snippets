<?php
function buildMenu($menu, $parentid = 0)
{
    $result = null;
    foreach($menu as $item) {
        if ($item->parent_id == $parentid) {
            $result .= "<li class='dd-item' data-order='{$item->order}' data-id='{$item->id}'>
            <div class='dd-handle'>
                  <i class='fas fa-arrows-alt'></i>
                  <div class='content'>{$item->title}</div>
            </div>
            <div class='menu-action'>
                <a class='edit-menu' href='/admin/menustop/{$item->id}'>Edit</a> |
                <a href='#' class='delete_toggle text-danger' rel='{$item->id}'>Delete</a>
            </div>" . buildMenu($menu, $item->id) . "</li>";
        }
    }
    return $result ?  "\n<ol class=\"dd-list\">\n$result</ol>\n" : null;
}
// Getter for the HTML menu builder
function getHTML($items)
{
    $lists = buildMenu($items);
    return "<div class=\"dd\" id=\"nestable\">".$lists."</div>";
}