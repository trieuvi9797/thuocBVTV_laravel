<?php


namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{
    public static function categories($list_category, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($list_category as $key => $categories) {
            if($categories->parent_id == $parent_id)
            {
                $html .= '
                <tr>                                      
                    <td>'. $char . $categories->name .'</td>                                        
                    <td>'. $categories->parentName .'</td>                                        
                    <td>'. $categories->updated_at.'</td>                                        
                    <td>
                        <a href="/admin/categories/edit/'. $categories->id.'" class="btn app-btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                    
                        <a href="/admin/categories/index" class="btn app-btn-danger" onclick="removeRow('. $categories->id .', \' /admin/categories/destroy\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>                                     
                </tr>';
                unset($categories[$key]);
                $html .= self::categories($list_category, $categories->id, $char .'--');
            }
        }
        
        return $html;
    }

    public static function showCategory($cate, $parent_id = 0)
    {
        $html = '';
        foreach ($cate as $item) {
            if($item->parent_id == $parent_id){
                $html .= '
                <li>
                    <a href="/danh-muc/.html">
                    abcessd
                    </a>
                    <ul>
                        <li>
                        <a href="/danh-muc/.html">
                        
                        </a>                  
                        </li>
                    </ul>
                </li>';
            }
        }
        dd($html);
    }
    public static function isChild($child_Category, $id)
    {
        $html='';
        foreach ($child_Category as $item) {
            if($item->parent_id == $id){
                dd($item);
                $html .= '
                <ul>
                    <li>
                        <a>' . '$item->name' . '</a>
                    </li>
                </ul>
                ';
            }
        }
        // return false;
    }
}
