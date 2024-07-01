<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccCoa extends Model
{
   
    use HasFactory;
    protected $table = 'acc_coa';

    public function dfs($HeadName, $HeadCode, $oResult, &$visit, $d)
    {
        if ($d == 0) echo "<li class=\"jstree-open\" id='" . $HeadCode . "'>$HeadName";
        else if ($d == 1) echo "<li class=\"jstree-open\" id='" . $HeadCode . "'><a href='javascript:' onclick=\"loadData('" . $HeadCode . "')\">$HeadName</a>";
        else echo "<li id='" . $HeadCode . "'><a href='javascript:' onclick=\"loadData(this.id,'" . $HeadCode . "')\">$HeadName</a>";
        
        $p = 0;
        for ($i = 0; $i < count($oResult); $i++) 
        {
            if (!$visit[$i])
            {
                if ($HeadCode == $oResult[$i]->PHeadCode)
                {
                    $visit[$i] = true;
                    if ($p == 0) echo "<ul>";
                    $p++;
                    $this->dfs($oResult[$i]->HeadName, $oResult[$i]->HeadCode, $oResult, $visit, $d + 1);
                }
            }
        }
        
        if ($p == 0)
            echo "</li>";
        else
            echo "</ul>";
    }
    public static function getSubTypeData()
    {
        return self::where('some_condition', true)->get();
    }
}

