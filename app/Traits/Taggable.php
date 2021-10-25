<?php
namespace App\Traits;

use App\Models\Setting\Tag;
use Illuminate\Support\Facades\DB;

/**
 *
 */
trait Taggable
{
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function getTagListAttribute()
    {
        if (count($this->tags)) return $this->tags->pluck('id')->toArray();
    }

    public function syncTags($taggable, array $tagIds)
    {
        $tags = [];
        foreach ($tagIds as $id){
            if (is_numeric($id)) {
                $tags[] = $id;
            }else {
                $newTag = Tag::firstOrCreate(['name' =>$id]);
                $tags   = $newTag->id;
            }
        }
        return $taggable->tags()->sync($tags);
    }

    public function detachTags($id, $tanggable)
    {
        $taggable_type = get_class($tanggable);
        return DB::table('tags')->where('taggable_id', $id)->where('taggable_type', $taggable_type)->delete();
    }

    public function getTagChipsAttribute($line_break =null)
    {
        $tags = $this->tags;
        $line = $line_break ? '<br>' : '';
        if (count($tags) > 0) {
            $tag_list = array_column($tags->toArray(), 'name');
            $str      = "";
            foreach($tag_list as $item){
                $str .= '<span class="chip chip-outline">'.$item.'</span>' .$line;
            }
            return $str;
        }
    }


}

?>

