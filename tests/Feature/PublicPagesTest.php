<?php

use App\Models\Post;
use App\Models\Project;

it('serves the home page', function () {
    $this->get('/')->assertOk();
});

it('shows projects on the home page', function () {
    $project = Project::factory()->create(['title' => 'Laravel Terminal Portfolio']);

    $this->get('/')->assertOk()->assertSee($project->title);
});

it('serves the blog index', function () {
    $this->get('/blog')->assertOk()->assertSee('Blog // Fabio Spanò');
});

it('shows posts on the blog index', function () {
    $post = Post::factory()->create();

    $this->get('/blog')->assertOk()->assertSee($post->title);
});

it('serves a single post by slug', function () {
    $post = Post::factory()->create(['content' => 'This is the full article body text.']);

    $this->get("/blog/{$post->slug}")->assertOk()->assertSee('This is the full article body text.');
});

it('returns a custom 404 for a missing post', function () {
    $this->get('/blog/not-a-real-slug')->assertNotFound()->assertSee('404 // Page not found');
});

it('serves the contact page', function () {
    $this->get('/contact')->assertOk()->assertSee('Send message');
});

it('returns a valid sitemap', function () {
    $post = Post::factory()->create();

    $response = $this->get('/sitemap.xml')->assertOk();

    expect($response->headers->get('Content-Type'))->toContain('application/xml');
    expect($response->getContent())->toContain('/blog')
        ->toContain('/contact')
        ->toContain($post->slug);
});