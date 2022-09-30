<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Image;

/**
 * カテゴリ
 * category_rouken
 */
class CategoryRouken
{
    public function getTag(): string
    {
        return '<img class="image" src="' . $this->getData() . '">';
    }

    public function getData(): string
    {
        return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPoAAAFeCAYAAACsFgJxAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDcuMi1jMDAwIDc5LjFiNjVhNzliNCwgMjAyMi8wNi8xMy0yMjowMTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo2MWE0YTkwNS01YmE0LTQ3NTYtYmE2OC1kNzU3MmY1NjA5OTUiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QkMyNjIyNjczNkYyMTFFREFBRjdFRUZCMDVDMUMxMjYiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QkMyNjIyNjYzNkYyMTFFREFBRjdFRUZCMDVDMUMxMjYiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDIzLjUgKE1hY2ludG9zaCkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo0YmY4OTdkOC0zZmZiLTQwMGUtYTZjMy01ODM3ZGIzM2Q3YzciIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NjFhNGE5MDUtNWJhNC00NzU2LWJhNjgtZDc1NzJmNTYwOTk1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';
    }
}