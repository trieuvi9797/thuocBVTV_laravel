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
                    <td>'. $categories->id .'</td>                                        
                    <td>'. $char . $categories->name .'</td>                                        
                    <td>'. $categories->parent_id .'</td>                                        
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
}