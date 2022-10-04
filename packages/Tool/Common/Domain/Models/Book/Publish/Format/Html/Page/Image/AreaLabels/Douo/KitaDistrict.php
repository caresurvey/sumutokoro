<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Douo;

/**
 * ラベル
 */
class KitaDistrict
{
    public function getTag(): string
    {
        return '<img class="image" src="' . $this->getData() . '">';
    }

    public function getData(): string
    {
        return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAAOECAYAAAAbrQzfAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDcuMi1jMDAwIDc5LjFiNjVhNzliNCwgMjAyMi8wNi8xMy0yMjowMTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo0M2Q1NDY3Ny1jMDk2LTRjNmYtYjhjMy1lM2MzYmRlMGJhNWUiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OUYwQUM0RDAzOThFMTFFRDhBQTRGQkREMzVCNzM5MjMiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OUYwQUM0Q0YzOThFMTFFRDhBQTRGQkREMzVCNzM5MjMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDIzLjUgKE1hY2ludG9zaCkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpjYzk2MTJlYy00NTE1LTQwOGEtOWE5MC01ZDFmZWNmNDkzYmUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NDNkNTQ2NzctYzA5Ni00YzZmLWI4YzMtZTNjM2JkZTBiYTVl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';
    }
}