<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Page\Image\AreaLabels\Dohoku;

/**
 * ラベル
 */
class ShunkoShunkodai
{
    public function getTag(): string
    {
        return '<img class="image" src="' . $this->getData() . '">';
    }

    public function getData(): string
    {
        return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAAOECAYAAAAbrQzfAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDcuMi1jMDAwIDc5LjFiNjVhNzliNCwgMjAyMi8wNi8xMy0yMjowMTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo0M2Q1NDY3Ny1jMDk2LTRjNmYtYjhjMy1lM2MzYmRlMGJhNWUiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RDg2NTQwMEIzOThEMTFFRDhBQTRGQkREMzVCNzM5MjMiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RDg2NTQwMEEzOThEMTFFRDhBQTRGQkREMzVCNzM5MjMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDIzLjUgKE1hY2ludG9zaCkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDphY2YzOGQyZS1lMjc1LTQxYmItYjYzZC0yYjFmNmRhMGYwM2QiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NDNkNTQ2NzctYzA5Ni00YzZmLWI4YzMtZTNjM2JkZTBiYTVl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';
    }
}