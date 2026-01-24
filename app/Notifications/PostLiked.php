<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PostLiked extends Notification
{
    use Queueable;

    public function __construct(
        public User $actor,
        public Post $post,
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'type' => 'post_liked',
            'actor_id' => $this->actor->id,
            'actor_username' => $this->actor->username,
            'actor_name' => $this->actor->display_name ?: $this->actor->name,
            'post_id' => $this->post->id,
        ];
    }
}
