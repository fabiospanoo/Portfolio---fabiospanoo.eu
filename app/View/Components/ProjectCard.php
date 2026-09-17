<?php

namespace App\View\Components;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectCard extends Component
{
    /**
     * Hues of the project tag classes, keyed by class name.
     * Kept disjoint from the button hues so tags never look like the button.
     */
    private const TAG_COLORS = [
        'project-tag-0' => '#F14C4C',
        'project-tag-1' => '#F7DF1E',
        'project-tag-2' => '#9CDCFE',
        'project-tag-3' => '#569CD6',
        'project-tag-4' => '#8B949E',
    ];

    /** Language/technology tag => tag class. */
    private const LANGUAGE_COLORS = [
        'blade' => 'project-tag-0',
        'java' => 'project-tag-1',
        'python' => 'project-tag-2',
        'php' => 'project-tag-3',
    ];

    private const FALLBACK_TAG_CLASS = 'project-tag-4';

    /** Ordered cycle of the button styles. */
    private const BUTTON_CLASSES = ['primary', 'tertiary', 'quinary', 'secondary', 'quaternary', 'senary'];

    /** Button style => hue. */
    private const BUTTON_COLORS = [
        'primary' => '#B100CD',
        'tertiary' => '#CE9178',
        'quinary' => '#9CDCFE',
        'secondary' => '#DCDCAA',
        'quaternary' => '#569CD6',
        'senary' => '#6A9955',
    ];

    public function __construct(
        public readonly Project $project,
        public readonly int $index = 0,
    ) {}

    public function tagClass(string $tag): string
    {
        return self::LANGUAGE_COLORS[strtolower($tag)] ?? self::FALLBACK_TAG_CLASS;
    }

    /**
     * Button style for this card, starting from $index and advanced until
     * its hue does not collide with any tag hue shown on the same card.
     */
    public function buttonClass(): string
    {
        $count = count(self::BUTTON_CLASSES);
        $idx = $this->index % $count;

        $tagHues = collect($this->project->tags ?? [])
            ->map(fn (string $tag) => self::TAG_COLORS[$this->tagClass($tag)])
            ->unique()
            ->values()
            ->all();

        while (
            isset(self::BUTTON_COLORS[self::BUTTON_CLASSES[$idx]])
            && in_array(self::BUTTON_COLORS[self::BUTTON_CLASSES[$idx]], $tagHues, true)
        ) {
            $idx = ($idx + 1) % $count;
        }

        return self::BUTTON_CLASSES[$idx];
    }

    public function render(): View|Closure|string
    {
        return view('components.project-card');
    }
}