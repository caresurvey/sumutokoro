<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Image;

/**
 * カテゴリ
 * category_other
 */
class CategoryOther
{
    public function getTag(): string
    {
        return '<img class="image" src="' . $this->getData() . '">';
    }

    public function getData(): string
    {
        return 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPoAAAFeCAYAAACsFgJxAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDcuMi1jMDAwIDc5LjFiNjVhNzliNCwgMjAyMi8wNi8xMy0yMjowMTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo2MWE0YTkwNS01YmE0LTQ3NTYtYmE2OC1kNzU3MmY1NjA5OTUiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NjE2MUQ4Q0QzNkYyMTFFREFBRjdFRUZCMDVDMUMxMjYiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NjE2MUQ4Q0MzNkYyMTFFREFBRjdFRUZCMDVDMUMxMjYiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDIzLjUgKE1hY2ludG9zaCkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo0YmY4OTdkOC0zZmZiLTQwMGUtYTZjMy01ODM3ZGIzM2Q3YzciIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NjFhNGE5MDUtNWJhNC00NzU2LWJhNjgtZDc1NzJmNTYwOTk1Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+ji61+wAAFa9JREFUeNrsnQe03cSdxnXdn23cC8adEnDoLYFgYwfHdAgthAWyGBJY2gJLQgkJkLOb3RwIEA4BsqEZSAwsZCmhLBtKwJhqAyF0Aza4YCfG2Lg9sDHa73/uvM3btxrdpluk+/ud8x3dJz1Jo5n5NKPRaCYXhmEAANmmE1EAgNEBAKMDAEYHAIwOABgdADA6AGB0AMDoAAAAAAAAAAAAAAAAAAAAAAAAkFFyRAG0JwzDgVoMchomDZaGSsOlEdI66c/StFwuN5cYw+iQrAE30WKI+7NV+sz97ueWXaVeUnepReor9XC/+7nfPdzvPk4btftt6l1CkOz835XZp5M6AJUbvJs0PWxMNkhfI5UaHz5qaXwukI5u4PyzL0mE0aFy9m/w8C0giTA6VM6yBg7bSxLP6CmAxrjGf0afqMVjUucyD/G5tEJaKa1yv2252i1XdVhvOlQ6qsBxb5FOy+Vya0gljA7JmH0vLc4P8q3uZti/uJL+Y+kTZ9LIpYy4tsRznaHFL2Jqe+ul03Xc60gZgPTdTDpLVxZoZV8mTSK2ANJp8p7SPQVM/ro0ltgCSKfJh0ovFDD5g1IfYgsgnSbfSppXwOQ/t2o9sQWQTpNPlJbHGHydNJWYAkivyY91RvbxF2k8MQWQToPnpJ8UqKq/Io0mtgDSafIW6fYCJr9P6k1sAaTT5BsX0bL+bxJdogFSavIdpfkxBv9UOoaYAkivyb8prY4x+RJpN2IKIL0mP0/6Isbks6URxBRAOg3eXbq5wPP4bdY4R2wBpNPkw6XnCwz9dL69ZiO2ANJp8vHumdvHSulAYgogvSY/tUBPt3ekccQUQHqfx28s8Dz+iNSf2AJIp8lHFHgeN67gyzMwaJRJp8n30+I30kDPv9hsKiflcrlbqnT+bkF+woe+7ZZtE0h0CfITQbQt7UZjE0XMl+5UmFaTghgd4g1m5vmpdF7Mvy2RDpWhnium6u9uFjbt0hD3e5D7Pdj9PbCdmduM3aPMS3hL+prCtpzUxOgQbcpRWtwh7R7zby9LBwX5gSFtrrRhTvZ74w7rhrmSttZcLKP/MylaW7oQBakw+WFa3CAValQbI73tqtCNypakKEZvViPbV2ObOKN21Di3rRjS0Lr+FilO1T3rhrb43t9Vv0e108gmuenOliar6r6S3IDRs2zy30mHpSTIq9xjwHvSPGlpkG/os4a0ta4dwGZpWR9RS2wbvKKn1M39/tSMLpN/Tm6g6p5lDmpwk9sruQekB6UnpbkyZUiyYXQoje2qdNyPgvw76oXSYlfqttdfg/xcaj8L8u+6O/JhkJ+C6QYZewXJhNGhMuaWsY9Vcxe4qnOb2kxtWiBzfhrzuGDvxG+TpkRstv3+Vbpcx2gleXhGh2Se0e2m+rA0OaLK/E47ve1uCmbqheU+0+p8W7pq+GYRm2dJx+jY75AyAMmb3SYyPEA6UZoijanGgIxuBpalnv7vv3ZdWAEgxTeT0dJCj8l/TAwBpN/kLW4ChijOJ4YAsmH0aR6TX0nsAGTD5Ed4TD6Tb9IBsmHyntKHESZvlbYghgCyYfTzfHObEzsA2TC5vbJb5JnffCgxBJANo+/tKc3vJXagDWbPTD++sdofImoAo2cH39BSs4kagOxU3dd4qu4DiB1og49a0m1yG9zRN1pLJ74nB6ru2aB7zLZeRA9g9GwQ9wnrIKIHMHoWnrviR4TZmhgCjJ4dFnjWTyZqADJCGIYPe1rdF7pRbQAo0TPAs571Nv3SsUQPQDZK9J1jpk1eLA0mlgDSb/Sc9GqM2Z+0z1iJKYD0m/34MB4z+xBiCiDdRrdPVV8qYPYl0tFuaigASKnZd3HfoBditvQtqSuxBpBOs58QFo811F0iTcT02YdqXPbMfq4Wl5S422rpBelVpznSIlMul/uMWMXo0KAluxbXBvEfvRSLTZds0yTbV3LWt97mbLNpkTdIv5Wu4Cs5gPqZfQfpzbD6nEFsA9TX7F2lf5JWVNHoTxPTjQ9dYLP8XJbLrZds7vMR0tnS+1U4zSJiGqCxSnjrRbeHdI30XkIl+nhiNgU3faKgqY0/VosJ0k7SjtI4qdi+8dYYd7ZqDFcRkxgd0md+6xc/RhomDXBqCfIt7W2fva6S7pfJ5xBjAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADQGDAlU5MQhmF3LfpLvaSNnGxqpVanpblcrpWYwuiQDkPbVNjbSLtL20lbSZtLI4tI78XSXOld6XlppvS6bgBfELMA9Td3i3S4NF1aGibLCul26SBXKwCAGht8Z+kGaVVYGz5xc6tvRuwDVNfcOWlv6dGwfnwh/U7ajhQBSN7kU6SXwsZhg/QraRCpA1C5wcdKD1RgyEXSX2O23+NqCHOlz8s4/nLpGFIKoDyDd5LOktaWYDoz6kzpImmSNMAd6yzP/y/rcE5r2BsvnSs9XqLxb5V6knIAxZt8iPSHEkw2WzpF6u853i89+z1bIBwD3HFfLTIcL0rDSEGAwibfRVpYpLHutdb3Io75sGf/W0oI1z5FthG8K40gJQH8ZjqwyKr6E9KOJRx3ruc4F5bxOHGCe79eyOyU7AARJjrGtWTHYR1iptprthKO2y3muEeVGdZR0owCYX1Z6kXKAvzNOEcWYXJ7Zh9axrHHxRxz5wrCbDeQaQXCfDupC5A3zDekdQUM8yPXj72c4x8Sc9w+CYT/sgJhP55UhmY3+ZbuPbQPuwEcWeE5LvYc+4OErsF66/065hpW020WmtnkvaTXYwxijXKTEzjPPZ7j35/gtXSWHou5lvtJcWhWo19foOPLQQmd533POX6a8PUMlBbEXNM+pDo0m8n3L/Bc+72EztMv5hxH1vi6XinlbQFA2k3e056PYwxxXYLnmhRzni2rdH3TY865HzkAmsXoF8cY4U9JDvCgY30/5vm/c5Wub3TMW4THyQHQDCYf5AZwiGK9tEPC57vbc65nqnyd19S6JgF+OhEFNecHku/d9SW5XO5PCZ9vvGf9M1W+zl/GbDuKbABZLs2tVbrVU8otlnonfL4vxZSqR9Tgep/wnPstcgMlepY5Uerh2XahSvPVNSrNa1GiG3d51lsnoU3JDpDF0tx6j73jKeHsk9RuVTjnTZ7zza/RNY+MqVFMJVdQomeR3YL8+OpRXKnSfF0VzrmXZ/2ztbhgXdMCLeZ5Nu9JlsDoWeRQz3oz+I1VKE3HaTHas3lGDa/7Bc/67ckSGD2L7O9Z/6BKvuVVOF9cx5RHanjdf/as35wsgdGz9nw+WIutPZvvqPGNZYFuLHNqePm+L+T6uHgBjJ4ZdvXdA6Q/VuHGYqO6TPBsfrTG174oZttwsgZGzxK+59HXVLourcL5pkjdGqDabqyI2cbQ0Bg9U2xe4vNrpRwWU4OodYneitExerOwiWd94j3EVG3vqsWBns3PV6kGUW4eayFrYPQs4evbvqQK55ok9fdsu7cO1x5n5lVkDYzeDEZfWcNqu3FPHa69f8y2T8kaGD1LbORZn2hvOFXbuwT+jjmv1fi1WhsjY7atJGtg9Cyx3rO+e8LnsXfnvnHfp9fp2uNGf51P1sDoWWKNZ33fhM9zQsy2u+p07dt61i+vwtd6gNHriq/RaWCC1XYryQ/wbH5apnqv1hftBoLcw7P5XbIFRs8aiz3rxyZ4juOkLp5tN9XpureRBnm2vUi2wOjNYvQtEio5zeCneTavrmO1Pe4NwAtkC4yeNd72rN+p3PnUOvAtaZRn23RV2+v1vvromG0zyBaQKWTmiTEjrexU4bFtvvI3Yo6/dZ2uea+YML1OrqBEzyL2PLrBs+2bFR77WGmcZ9vjKs3rZarzYrbdR5aArJbqszyl23sVTIfc040352NKna519wLTTW1FjoCsGv2imIz/7TKPeWXMMWfV6TrtUWJ2TLgeJTdAlo2+TUzmt1K9R4nH+7q0odFmLtV5zyxQmh9MboCsm/25GANcVcJxNnETPvh4ok7Xt7P0WUy4niEXQDMY/dgCpd3xRRyjr/RizDGslN+xDtc2Qppb4PomkAugGYzexaYjKmDSE2P237jA869xTR2ua7D0aoFw3UwOgGYy+yFhYf5T2q7dPl1tZhNpSYH95kl9anw9o6Q3C4RrkdSP1IdmM/tdYXEscvOlryzif602MLHG1/EVF8Y41tc6XACNYnSbI31+mCzn1jD8No/cKQUa3to4mRSHZjb7rtLahEx+i/sktBbhHi49WGS4riKlAbOH4b7SugpNfrvUuQZh7S6dL60qMly/qtXNByANZrePPz4p0+RXVNvkOn6Lq6aX8qhxKSYH+P9m2lR6qgQjWWeZQ6ocJuvJd7n0UQnhWse85wDxxrIGrsOlGTFGmmONblLvKpy/t3uUuKTAu/64sH2FlGxMqF41pult/DebmNFmeLGq+UfSy7lc7t2Ejm8j0uzjzmHv620Ax83KzA82zdO10rkK31pSD6BxbiR3J9Tab7WPXYhRgMYz+fAEDP58tdsIAKDyZ/E1ZZh7nasJ7EksAqTD7GcVaW7rVjtTOl0aSMwBpM/sZ0irI8xtH6jcJB0l9SemsgGt7k1ejdfCquJDpEXSrFwut4KYAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACA5sKmRpb61uG8o6VHpLXS6zbFM6kBUB2znSp93G7G0u1reO5XOoz5buPADyFVAJI12v4REyy8UaNzj/TM3nI4KZM+OhEFDc05EevG1WgGlc6e9RuRLBgdkitRbc7ySRGbFkrMpgIYPSOc5ll/dS6XC4kewOjpL82tav6diE1rpOuIIcDo2eAfpJ4R629Wab6c6IFS6UIUNFxp3qLFmVGbpCuLrA2cJ20lvSZdqpvDSmIWoLGMforntdYdRezbRXqxw34zpFwZ4RjjCcdUUgmgMpObUed5DLZjEfvv5dn3qxidZ3RoHI6VxkSsf0jV75eL2H+UZ/0wohajQ2OU5t20+Iln878QQ4DRs4G1tI+OWP/fKs2fI3oAo6e/NO+txQWezT8ihqBSeL3WGJwtbRyx/j6V5i9m6IY2QovjpB7SY9KT9PKDZinNR7rvvTuywfV3L+VYUz0t5YeUEa7EWt21Tx/pZGlZh2O9K21BLqBEbwYuk1oi1k9Tafdqim9g9u5+gvRd6YgguqffZtJO0jtkA4ye5dJ8ohZHRmyyPu0XpvSahrvq+fHS5kXs8hk5AaNn2eTdtbjWs/nnKs0Xp+ha7NXgQdIJ0r4BjbwYHf6XH0pf9my7LiUG39aV3Pal3SCSFKPD/zXINkHMa7MGL803tYY19+y9C6mJ0SHa5DZE000pjvty2g5apQXSl8gB9YFnqdrzY2nXFISzZwLHmC2dEuT7CJxM0lOiN0tpvkfQ4K3pCmNXLQ4IogemLIZl0m+s1tL+9WDMp7J0mMHomTK5TcAwPfCPrlrv8NmrsO9JU6Whpe4u/UG6Mcj35lsX8T99PPt+Qu7A6FkxuZVmNwTRH63UM1zWFfUIZ/CJZRxinjQtyA9xtYCUxujNzjnOUI1i8O2due37934l7r5euivINyg+Tl91jA55U31Di581QDis6nyUdGJQ2WuxH8rcl5OyGB3+Zq4xWvxHEP1243PJnmV71iAoV7jn7iTOtYyUTR+8XqueyQdo8bA0wFcySrNqFJyxJZrcRo+9lVTE6BBvcmvk+r20pedfHpCqUf2t5JPP1UG+wfCrqppb19aLEw5bN896Pmqh6p5Kk9vN87fSHp5/sdbp46wRSyRVczgmyHdJLWdK5eel6+0RQ2FaXcWo8dUoWsk1GD2NWB9239TC9lz+bRnq4wRuJl935j5M6l7iIez81qnlxjR/8w4YvV6lucXnD2L+5fsy1rMVHN+GYjreaWwZh3jcVc/vVjgapcq8ipyD0dPGJoG/B9j1MtdVFZTgV0snBeX1rLM2gTN1/rl1jJu+nvUbyDYYPW34Xj09JZ1ewXGts80pFew/rc4mN3x93b8g21QfWt2TzMm53BpXerbnfXuO9vT/LpYdKgxaI5jJ1xjHBJAYPZX8Y5B/D20skg6UyT+q8JhxpbHdXKy/+YQKS/1q042sQdU9S6W6leDb2jDOWi7W358ncFh7XWeDSE5pt+5pZ/A7dY5V7ll+8xTmNd6jY/RUG35Bgsf6VCbeRz+t37x9ATdD6+akLEp6Rz1S6Dp4j47RoZ3ZrXfNIym+hBaez3lGh+wT9XqNQScwOmSMfhgdo0NzluhU3TE6YHTA6JA2hmJ0jA4ZJgzDjYLoATgYUBKjQ4bY2bN+EVGD0SE7+L7Pf5OoweiQjWq7fTf/Hc/ml4mh2kDPOEjCzJODfF/8jiPd2FTKk6ReEbu9ncvllhJ7GB3SYXKbIfW/pK4l7noHsUfVHdLDLmWY3HrEXU3UYXRID08G+UEvi8U+Sz06gW/0AaNDrZBh7RXZZUX++2PSbtrnIWKOZ3RIHxdIH0h/H+SHjFrhquc2ht7bTs/J4EuIKowO6WBdRKlu38r/uxNQdYcUsTiI/oyUCR8wOmTo2dsazU7qUIL/gpldqLpD9sx+ZxiGM/VzV+l9/f0KsYLRIZtm/1CL+6pxbN1ExmtxsDRT5/k9sU3VHTKGTL57kH8Hf47dSPT3zVJnYgajQ7aY3CH/HSedRbRgdMgWYyLWnUq0YHTIvtH7ES0YHbLFlyPWMRAFRociWOVZ39JIgQzDcGMthkVsmkMSYnQo3+iNViWe4Fn/BkmI0aEwvuGTt2mwcB7sWc/QUpA9VIV9IoygguONDqP5oFHeUSscw6TWiDDajLE9yBWU6FCY+Z5SfZR0UQOY3NoKbpKiDP2sTQ9NElYHusBmCPtcVDylnwdEbL5I26Zoebf0krsp2PfiYZWD1S3IN7xZBxl7T76Z5//uIgUxOhTPnR6jG7s7NWLbwm0kHVV3KB4bXXVeysJ8qWojK0g6jA7FV9/t+3GbMKE1JUG2z2AvJeUwepb5ImLdhgTM/nSQnzjhtRTUPvZVeNeTFTB6lplV5LpyzP6CFttL+0nTpPca5JptmOdbra1AYfw7aQ3ZoAY1PaKgfoRh2F+LPzpDGjZK6t7VGq7JTV9sc6ENluy3TZXUtcqXabUWG3vOnsFtpNgP3GCSgNGbyuz25mPPIP8a6ilKOAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACiDXBiGxAJAxulEFABgdADA6ACA0QEAowMARgcAjA4AGB0AMDoARgcAjA4AGB0AMDoAYHQAwOgAgNEBAKMDNCf/I8AA7T9KKR06v5oAAAAASUVORK5CYII=';
    }
}