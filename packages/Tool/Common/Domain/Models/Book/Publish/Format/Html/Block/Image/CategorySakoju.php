<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Image;

/**
 * カテゴリ
 * category_sakoju
 */
class CategorySakoju
{
    public function getTag(): string
    {
        return '<img class="image" src="' . $this->getData() . '">';
    }

    public function getData(): string
    {
        return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPoAAAFeCAYAAACsFgJxAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDcuMi1jMDAwIDc5LjFiNjVhNzliNCwgMjAyMi8wNi8xMy0yMjowMTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo2MWE0YTkwNS01YmE0LTQ3NTYtYmE2OC1kNzU3MmY1NjA5OTUiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QTJEMjAzQ0EzNkYyMTFFREFBRjdFRUZCMDVDMUMxMjYiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QTJEMjAzQzkzNkYyMTFFREFBRjdFRUZCMDVDMUMxMjYiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDIzLjUgKE1hY2ludG9zaCkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo0YmY4OTdkOC0zZmZiLTQwMGUtYTZjMy01ODM3ZGIzM2Q3YzciIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NjFhNGE5MDUtNWJhNC00NzU2LWJhNjgtZDc1NzJmNTYwOTk1Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+ETMrrAAAEDlJREFUeNrs3QusJXV9wPEZ98XlsTxE2AfQBWnlIUYEBEFbMbRYWmiA0ti4rU1LkGqpm9ZKqJbG2rRW0zS1bVhTA3WzQOVhTalWpLUPNCoi8ojlYdkVVBZ2l7K77Ovug9PfP/fU3F7OnHvuPWfmnJn7+Sa/DMzZnZnz+/2/+//PnJn5561WKwPQbF4hBQDRARAdANEBEB0A0QEQHQDRARAdmEvM73cDeZ7LIqBHB0B0AEQHQHQARAdAdGCOMF8K0CutVuv1sXhNxPo8z++TkXoVr69AZXWaF7Eq4u6Iz0VcWuG+84gbWv+f2yMWqAzRMdg63dR6OVdVtO9fanXm91SG6BhcjU4qEO3ZivZ/c8H+71GdeuBiXD04qWD90SHb4gr2f1DBekN3omOA7Ory2Y4K9r97FscFomOGjBd9kOf5/iGKPq40REf5vCgFIHrzeUkKQHQARAeIDoDoAIgOgOgAiA6A6ACIDmAK3jBTAa1Wa0UsTssm7hnfm03cupruUd+W9XZ322sK1h8U235deztlsqxg/ZLY/wlZ73fopafgJj/x9t95nm/XQson7/eZcjO1TCv5R2PxgZQq2XgZ6cm7VdGGPiUVRK+z5BfF4vMyMS1nRjv6ljQ4R68r50tBT7xdCoheZ7ZJQU9slQJD9zoP3dOFqoez4lcxIcteiDg52tFzUkH0Ost+XixuyCauuk/t7VPyt/SwmaMjDij4bEvJPeK8iOVZ8cXEZ7KJXxK6NpOIQyf9/yHt735/xHuiDT2gpZTfEL0Ftpo8HxxxWMQrZvF3Lyx4C+t4xKIKjv3Wgv1/UWXrgd/Rqxo69fd7cdG72XbFdqt4b1vRPnarbD1wMQ4gOjCrnh5ER4PwXneiAyA66sSBUkB0NJ+Fhu5ER/MpurNvp9QQHc3hsIL1poQiOhrEoUQnOuau6J7OIzqaQKvVShfijir4eKMMER3NYHmXzzZJD9FRPmMV7OMYohMdw63Twgr2/eounz2tNETH4Fjc5Rz6sJL3fWrB+g0VPSILohuiB2W/eOKUgvXrlYXoGCyLhniefnrB+keVhegYLEXvhEvvaivtpYpxWpDOz5cWfPygshAdgyW9m+17HdZ/Ks6Ty3yw5C1dPntIWWqEl0PWpk4/EfHV9ksZd0b8TftmljL3ubbgpZC7I8ZUhegor14HzOZNsrPYz6KIrQWi/7tK1Atvga0ZMVSv6s2rP50V/6z3byrhHB3N4De6fPZZ6TF0R/3bxIqI/QXD9sdkSI+OZrCqS9u4TXr06Kh/ezghYk9Bb556+eNkSY+O+vNnEQsKPrsrz3MPsujRUfO2cEWrOz8lS0RHvdvBsojNXSS/W5aIjnq3gXRzzNen6c3fKFNER33rn0esmUby1TJFdNRb8humkfz7EYtli+ioZ90XRnx6Gsn3RZwvW0SXwHrWfEnEva3pWSVbRCd6Pet9ccSmHiS/UbaITvT61XlpxK2t3rglYp6sEZ3o9anvWMQHujxbPpWbSE50otenruli29URP2j1zgdljuhEr08P/rsRz8xA8NTbXy57RCd6PWqZXjP1eGtm3Nd+2yuITvSa1PLCGQg+HvGHEQtkrvl4Z1yzeLHHP/e1iCvzPP8vKdOj69HrV8t0S+vt09zOujL9OdkiOtHrXc95Ee9N73abJPiTEb/vXexzl7xfWWP4J4ujK/2BaVHybC4gOoBRwDvjAKIDIDoAogMgOgCiAyA6AKIDIDpAdABEB0B0AEQHQHQARAdAdABEB4gOgOgAiA6A6ACIDoDoGAjtqZRXpKVsEB3NlPwXY/FsxPqI5+L/3yErc6sBmJKp+TU+vj176mT2mi5Zj45mcX7E1OF6mkn3AqkhOprD4oL1Jl0kOgCiAyA6AKKjWvIZrkfTGoD50csl8ntmLK6JOHSIh3FWxLIO6zdE3DfkFG2M+Hi0o+9qLUSvq+SnxuKbmavb07E54pRoS5ukwtC9jryT5D1xZMSl0kD0urJHCnpmtxQYutd16L48Fg+2eywU80TEGdGWtksF0esoelok2d8VcZSMdOTpiBsjtmhLRK+z6NCWnKMDIDoAohuKyhV6Yb4UjHYDjvP8tIEzIk4awXrtyyaumN8f3/Ml1SY6Zid5knttW/RR5uE41pUh+yOqNqIdjqvuIyt5es3TNyJeWZND3hZxdrSHx1TPOTp65xM1kjyR3mKzWtn06Oi9Nz88Fs9n9XyM9NhoEz9QRT06pue4Asmvba8fdqRrO3cWHPsK5SM6ehwoFazfOCLHtz+iqNd2gZfoAIgOoBQMs+o2ph+Bi58e1tGjwz82IDoAogNwjj6HKHpAJM1tvmJEjvGEgvV7lW8ET7fcGTd6RE3SO+DTnXHz6nboEcuiTTyriobumJ6tEf9Qw+P+5wiS69HRY4+eFkuziVlUjqnJYT8XcXbEU9qEHh29k6ZLelO7lxx1vhxxTpJc2fTomFmPPpkfizg54oARO9TxiPT8+XptgugYjOz1aFDag6E7AKKj5j2j3nx0ccNMDcQZ9WE8wYkOIoHoc5PooZfF4rqIi7J6vQCyH9IV+m9H/Hn8w3WPVlBxZ+Gqe+WSnx6LL2Zze3bV66PdfERrIHpTJR+LxeMRx8pGdnG0nX+Shmpw1b1afoXkP+KDUkD0pvJGKfgRZ8UIR/urCBfjquXIgvVpbrX/aeh3To/a3hHx+g7r0+wuWzQLos8VHmj493uqg+gwdAdAdABEB+AcfeTo916EVqt1cIm13BvHt6PP41NkomOW8qSXUaS7y34hm7h6Xea+0pXxz2YTd7T9UPYN3VGN5Ok22m9lEzfgLK5gl4dF/HraZ+z7ZBUgOsqXfGE28bv0MB6GOTrizjgGI0Gio2Quy4onT6iC1KO/XRmco6NcTu+wLr0x9kNZ8Qwv/XQEH+swenhDhAdSiI4SWdRh3RMRN5a0v9/uIPoRymDoDoDoAIgOwDk6OlPWm37c1aZHB0B0AEQH4BwdM+L4OJe+IJb7Brzd9LqnJR3Wb5dyoqN6jouoclKE70i5oTuazaaIu6SB6GgueyN+1dCd6GguD0W8LZuYTgrO0TEEvhdxZcT+EradtpneKrNOmomO4ZLem/6vI3x8hxes36N0REdndnZYt7XiY1jearVelb18lpVd2cRjtOmUMP00lx5nPSfivILz/Z3KSXR0Zk3EqoixSes+WeH+Pxxx/QC285hSEh3dBTk34r3t3jOJ/y9l7/T/HpqJnvzaAW3yC0pZIenppH4CM8r1Ha0ODKJeFX6Hx1v9syViqfZTHX5eq5ZHO6z7bs2+w3V9/v3NEZdGbCjr0Vro0Yed6yOn9IjjERfVrEdPcXXE9h567v0RGyLuj7gl4pqII7Sd6sn7Tbh/lWcmSTZxEe2SbGLihfST2LqZ5nBqzaqswaR9p+N/Xfs6T/qt/cX2+nTlfXs7tmo7RJ+rotc6h4PsibUd5+hoeg9DcqKj2YKS3NB9zg3f65q/XtqNtkF0AIbuAIgOgOgAiA4QHQDRARAdANEBEB0A0QEQHQDRAaIDIDoAogMgOgCiAyA6AKIDIDoAogNEB0B01JlWq3VcxMkRC2RjbhTcbKqjX6OjIm6NeD7iqYir+tjWoRH/OGnG000R74+YL9NEJ/rw6jM/4qEOUxKfN8vt3VwwxfEjEW+WcaITfTj1WVkg5h/NcnvrppnT/KaIV8q8c3RUy/sK1q+b5fa+PM3nvxbxnZD9CqnXo+vRq6nNuQW97uaIsVlu8+Auw/epfC5iiUoQXQLLrc1tgxy2T9n2z0V8vwfZ0z8ql6sG0VFOXU6M2NdBvN0RRw9oH4sjVvfYu3864hCVIToGW5e/LRDukyXs6609XKRLPBlxhuoQHYOpSbqZZU8H0VIPf2JJ+0y9+5oeZB+P+C1VIjr6r0nRcPrvKtj3OyJe6EH4j6oU0TH7ehxf0Ju/FHFKRcdwbMS9Pcj+FhUjOmZXj1sKpLq54uNYEPGX04i+WsWIjpnX4qwCoUo7N+/hmH45YkfBcX1J1YiOmdfiP0ax54z9v7b9MM1U7lA1omNmdbisQPJdEceMwPEti/j2lGO7SuWIjt5rcFCXu9T+dISO85CIu9vHlZ6oW6h69SDvV9Y8z2Wxf4E+Hov3d/hoU8SJkeNtXf7um2Lx1ohFFR1ukvvaiHR+/o1BfP2I9RG3x/fcpTXo0Zua/9cW3OqaeM80f/d9reaQRggHaRF69CZKPi8WX404u8PHj0WcFvndV/B3Uw/+QsRYg1JyTXzfv9YyBo/n0YfL7xRInri1SPI2hzdM8sQxmgTRm9abp7vcPtLlj2ybZiT1bCwebFhavqBlEL1JkqcXMa7J+r+Adnl76F93Nkf8Zvzj9Z9aRzl48+dw+HBE3497hhjpdVJvbp+vjw24XaTRwvIp63dHnBAxyKvj++J7bNckiN603vxnYnHdILcZoozHYnzAx7m5g+jjsa8Nqmjoju7ypPevrU1uygaI3tzz8lsiXiUbIHpz+YuI86UBRG9ub54e/vD6JRC9wZL/ZCy63e31B7IEotdb8tNicVdE0Yyl6Y2ua2UKRK+v5MfH4u6IxQV/5OGIVTIFotdX8nRl/Z6IpQV/ZEvEZXme75YtEL2+fCbi1UX/DkSsDMmflCYQvd7n5d1+RvtQSP55mQLR682pXT5bG5L/iRSB6PVnY8H69GTWldIDojeDeyOenrLukYhL2g+fAESvOyHz3lhcEfFUe9U3I3421m+VHQwLj6mWI/t97d/RD+n2BleA6PWXPf2MRnIYugPQo2OGpBlQY/Hj2cQkC/2QtrOsw/qx2Md5sdwxgMN9MWJde+QDoqNHyc+NxZ0RS0rcTfoH5CsD3N4DcdwXh+zPqKChO6aXPE0EcVvJkpfBGyL+SgWJjt44Nnv5ixzrwjnKR3T0RprMoa6/0z+hfERHD7Qfd706Yk/NDj3dLuyZ/ApwMa45sv99nKunC2VnDmBzB0fc0F5OZn/EuyOeH8A+0h2EX3HHYEWYNnno+V9RMI3wqiEf14MdjmmLihm6AyA6AKIDIDoAogMgOkB0AEQHQHQARAdAdABEB0B0AEQHQHSA6ACIDoDoAIgOgOgABou3wNaYVqu1uKR/rFO7OKLD+oWxzzQn284S9rmjPbc8iI624D8fi9VZ9bOzjEX8sKRt74vvdXMs3x3Cj6uyoftcl/yoWHwmq+8UTN06nXdFXK/KREeWnR1xYIO/34VKTHQMZpaUUWajEhMdWfa1iC819LulOeT+WInLOS9CjcjzPE2NdEn858qIUyLmNeSrvRBxW3y/R1W5BMy9NvT8p5+stnSY5+wC2QHRm1WDd0bsmyT5mohcZjCwkWC/ssZQSxYHI/uKbOKK+lOR06/LCEZKdACjj6vuANEBEB0A0QEQHQDRARAdANEBEB0gOgCiAyA6AKIDIDoAogMgOgCiA0QHQHQARAdAdABEB0B0AEQHQHSA6FIAEB0A0QEQHQDRARAdANEBEB0A0QGiAyA6AKIDIDoAogMgOgCiAyA6QHQARAdAdABEB0B0AEQHQHQAXflfAQYAzCSfUbapMQcAAAAASUVORK5CYII=';
    }
}