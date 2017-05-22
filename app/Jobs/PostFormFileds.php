<?php

namespace App\Jobs;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PostFormFileds implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $id;
    protected $fieldList=[
        'title'=>'',
        'content'=>'',
        'thumb'=>''
    ];



    public function __construct($id=null)
    {
        //
        $this->id=$id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
    //根据模型填充数据
    protected function fieldsFromModel($id,array $fields){
        $post=Post::findOrFail($id);
        $fieldNames=array_keys($fields);
        $fields=['id'=>$id];
        foreach ($fieldNames as $field) {
            $fields[$field] = $post->{$field};
        }
        return $fields;
    }

}
