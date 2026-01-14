<?php

use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('user can create a post', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->post(route('komunitas.post.store'), [
        'content' => 'This is a test post content.'
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('posts', [
        'user_id' => $user->id,
        'content' => 'This is a test post content.'
    ]);
});

test('user can comment on a post', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $post = Post::factory()->create();

    $response = $this->post(route('komunitas.comment.store', $post->id), [
        'content' => 'This is a test comment.'
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('comments', [
        'user_id' => $user->id,
        'post_id' => $post->id,
        'content' => 'This is a test comment.'
    ]);
});

test('user can like and unlike a post', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $post = Post::factory()->create();

    // Like
    $response = $this->post(route('komunitas.like.toggle', $post->id));
    $response->assertRedirect();
    $this->assertDatabaseHas('likes', [
        'user_id' => $user->id,
        'post_id' => $post->id
    ]);

    // Unlike
    $response = $this->post(route('komunitas.like.toggle', $post->id));
    $response->assertRedirect();
    $this->assertDatabaseMissing('likes', [
        'user_id' => $user->id,
        'post_id' => $post->id
    ]);
});

test('user can delete their own post', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $post = Post::factory()->create(['user_id' => $user->id]);

    $response = $this->delete(route('komunitas.post.destroy', $post->id));
    $response->assertRedirect();
    $this->assertDatabaseMissing('posts', ['id' => $post->id]);
});
