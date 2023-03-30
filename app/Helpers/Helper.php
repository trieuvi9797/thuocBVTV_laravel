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

    public static function showCategory($categories, $parent_id = 0)
    {
        $html_category = '';
        foreach ($categories as $item) {
            // dd($item->parentName);
            if ($item->parent_id == $parent_id) {
                $html_category .= `
                <li>
                    <a href="/danh-muc/'. $item->id . '-' . Str::slug($item->name, '-') .'.html">
                    '. $item->name .'
                    </a>`;

                if (self::isChild($categories, $item->id)) {
                    $html_category .= `<ul>`;
                    $html_category .= self::showCategory($categories, $item->id);
                    $html_category .= `</ul>`;
                }

                $html_category .= `</li>`;
            }
            dd($html_category);
        }
    }
    public static function isChild($categories, $id)
    {
        foreach ($categories as $item) {
            if($item->parent_id == $id){
                return true;
            }
        }
        return false;
    }
}
