<?php

namespace App\Http\Livewire;

use GrahamCampbell\GitHub\Facades\GitHub;
use Livewire\Component;

class CreateIssue extends Component
{
    public string $title = '';

    public string $body = '';

    public array $assignees = ['mikewink'];

    public int $milestone = 1;

    public array $labels = [];

    public int $rateLimit;

    public function mount()
    {
        $this->rateLimit = GitHub::rate_limit()->getResource('core')->getRemaining();
    }

    public function createIssue(): string
    {
        $response = GitHub::issue()->create(
            'mikewink',
            'laravel-github-api',
            [
                'title' => "Test Issue: {$this->title}",
                'body' => "The issue body: {$this->body}",
                'assignees' => $this->assignees,
                'milestone' => $this->milestone,
                'labels' => ['documentation', 'bug']
            ]
        );

        return "Issue {$response['number']} created.";

        /*
         * array:26
              "url" => "https://api.github.com/repos/mikewink/laravel-github-api/issues/5"
              "repository_url" => "https://api.github.com/repos/mikewink/laravel-github-api"
              "labels_url" => "https://api.github.com/repos/mikewink/laravel-github-api/issues/5/labels{/name}"
              "comments_url" => "https://api.github.com/repos/mikewink/laravel-github-api/issues/5/comments"
              "events_url" => "https://api.github.com/repos/mikewink/laravel-github-api/issues/5/events"
              "html_url" => "https://github.com/mikewink/laravel-github-api/issues/5"
              "id" => 919745561
              "node_id" => "MDU6SXNzdWU5MTk3NDU1NjE="
              "number" => 5
              "title" => "Test Issue 2"
              "user" => array:18
                    "login" => "mikewink"
                    "id" => 85063626
                    "node_id" => "MDQ6VXNlcjg1MDYzNjI2"
                    "avatar_url" => "https://avatars.githubusercontent.com/u/85063626?v=4"
                    "gravatar_id" => ""
                    "url" => "https://api.github.com/users/mikewink"
                    "html_url" => "https://github.com/mikewink"
                    "followers_url" => "https://api.github.com/users/mikewink/followers"
                    "following_url" => "https://api.github.com/users/mikewink/following{/other_user}"
                    "gists_url" => "https://api.github.com/users/mikewink/gists{/gist_id}"
                    "starred_url" => "https://api.github.com/users/mikewink/starred{/owner}{/repo}"
                    "subscriptions_url" => "https://api.github.com/users/mikewink/subscriptions"
                    "organizations_url" => "https://api.github.com/users/mikewink/orgs"
                    "repos_url" => "https://api.github.com/users/mikewink/repos"
                    "events_url" => "https://api.github.com/users/mikewink/events{/privacy}"
                    "received_events_url" => "https://api.github.com/users/mikewink/received_events"
                    "type" => "User"
                    "site_admin" => false
              "labels" => []
              "state" => "open"
              "locked" => false
              "assignee" => null
              "assignees" => []
              "milestone" => null
              "comments" => 0
              "created_at" => "2021-06-13T08:19:53Z"
              "updated_at" => "2021-06-13T08:19:53Z"
              "closed_at" => null
              "author_association" => "OWNER"
              "active_lock_reason" => null
              "body" => "The issue 2 body"
              "closed_by" => null
              "performed_via_github_app" => null
            ]
         */
    }

    public function deleteIssue(): void
    {
        GitHub::issue()->update(
            'mikewink',
            'laravel-github-api',
            11, // <- issue ID has to be dynamic!
            ['state' => 'closed']
        );
    }

    public function render()
    {
        return view('livewire.create-issue');
    }
}
