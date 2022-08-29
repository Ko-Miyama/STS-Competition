<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'manner',
        'comment',
        'score',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSelectedPaginateByLimit(int $id, int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('user')->where('user_id', $id)->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    //全提出データでランキング表を作る時はこちら
    public function getOrderedByScore()
    {
        return $this::with('user')->orderBy('score', 'DESC')->get();
    }

    //各ユーザの最高得点のみをランキングに載せる時はこちら
    //ランキングに載せる提出データが入った配列と、それに対応する順位が入った配列の2つを合わせたものを返す
    public function getRanking()
    {
        $all_submits = $this::with('user')->orderBy('score', 'DESC')->get();
        $squeezed_submits = [];
        $exists = [];
        $ranks = [];
        $ranker = 1;
        $last_rank = 0;
        $last_score = -100;
        foreach ($all_submits as $submit) {
            if (! in_array($submit->user_id, $exists)) {
                array_push($squeezed_submits, $submit);
                array_push($exists, $submit->user_id);
                if ($submit->score === $last_score) {
                    array_push($ranks, $last_rank);
                }
                else {
                    array_push($ranks, $ranker);
                    $last_rank = $ranker;
                    $last_score = $submit->score;
                }
                $ranker++;
            }
        }

        return [$squeezed_submits, $ranks];
    }
}
