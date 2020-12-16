<?php

namespace App\Repositories\Comments;

use App\Models\ {
    Comments,
    Ad
};

class CommentsRepository implements CommentsInterface
{
    protected $comment;

    public function __construct(Comments $comment)
    {
        $this->comment=$comment;
    }

    public function addComment($request)
    {
        $request->user()->comments()->create($request->all());
    }

    public function addReply($request)
    {
        $request->user()->comments()->create($request->all());
    }

    public function getComments($request)
    {

    }

    public function delete($id)
    {

    }


}
?>