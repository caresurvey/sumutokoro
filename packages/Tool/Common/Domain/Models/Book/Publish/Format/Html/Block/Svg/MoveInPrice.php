<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Svg;

/**
 * アイコン
 * 
 */
class MoveInPrice
{
    public function getTag(): string
    {
        return '<img class="svg" src="data:image/svg+xml;utf8,' . $this->getData() . '">';
    }

    public function getData(): string
    {
        return '<?xml version="1.0" encoding="UTF-8"?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70.17 21.95"><defs></defs><rect class="cls-2" x="24.11" y="-24.11" width="21.95" height="70.17" rx="3" ry="3" transform="translate(46.06 -24.11) rotate(90)"/><g><path class="cls-1" d="M4.33,4.9c-.1-.11-.16-.25-.16-.41s.05-.3,.16-.41c.1-.11,.23-.17,.38-.17h2.84c.34,0,.63,.13,.87,.39,.24,.26,.38,.57,.4,.94,.28,4.7,2.1,8.24,5.45,10.61,.14,.1,.21,.25,.21,.44,0,.14-.05,.27-.14,.38-.12,.14-.27,.23-.44,.26-.05,.01-.09,.02-.13,.02-.12,0-.24-.04-.35-.12-2.67-1.92-4.41-4.66-5.22-8.2,0-.02,0-.03-.03-.03-.02,0-.03,.01-.04,.03-.54,1.97-1.27,3.66-2.2,5.07-.81,1.24-1.81,2.29-2.99,3.14-.13,.08-.27,.12-.41,.12h-.11c-.18-.03-.35-.12-.5-.26-.1-.09-.16-.21-.16-.37,0-.18,.07-.32,.21-.41,1.3-.84,2.38-1.94,3.22-3.28,.86-1.4,1.52-3.09,1.97-5.07,.04-.17,.12-.31,.26-.41,.1-.07,.22-.11,.34-.11h.1s.04,0,.05,0c.01-.02,.02-.03,0-.05-.08-.66-.14-1.25-.17-1.77,0-.1-.06-.15-.16-.15h-2.88c-.15,0-.28-.06-.38-.17Z"/><path class="cls-1" d="M27.4,9.84c.09,.1,.14,.22,.14,.36s-.05,.26-.14,.37-.21,.15-.34,.15h-4.11c-.09,0-.14,.05-.14,.15v1.54c0,.1,.05,.15,.14,.15h2.3c.34,0,.63,.13,.87,.39s.36,.57,.36,.94v3.08c0,.16-.05,.3-.16,.41-.1,.11-.23,.17-.38,.17h-.11c-.11,0-.21-.05-.3-.14-.08-.09-.13-.2-.13-.34,0-.03-.01-.05-.04-.05h-5.99s-.06,.02-.06,.06c0,.13-.04,.25-.13,.34s-.2,.15-.32,.15h-.07c-.14,0-.27-.06-.37-.17-.1-.11-.16-.24-.16-.4v-3.13c0-.37,.12-.68,.36-.94,.24-.26,.53-.39,.87-.39h2.08c.09,0,.14-.05,.14-.15v-1.54c0-.1-.05-.15-.14-.15h-3.66c-.13,0-.25-.05-.34-.15-.09-.1-.14-.22-.14-.37s.05-.26,.14-.36c.09-.1,.21-.15,.34-.15h3.66c.09,0,.14-.05,.14-.15v-1.43c0-.1-.05-.15-.14-.15h-4.33c-.09,0-.14,.05-.14,.15v.56c0,3.7-.49,6.51-1.46,8.41-.08,.14-.19,.23-.33,.26-.15,.03-.29,0-.42-.08-.12-.08-.2-.2-.24-.35-.02-.05-.03-.11-.03-.17,0-.09,.02-.18,.07-.27,.28-.56,.52-1.18,.71-1.85,.19-.68,.33-1.38,.41-2.11,.08-.73,.14-1.37,.17-1.94,.03-.56,.04-1.2,.04-1.9v-3.19c0-.37,.12-.68,.36-.94,.24-.26,.53-.39,.88-.39h8.16c.34,0,.63,.13,.87,.39,.24,.26,.36,.57,.36,.94v1.15c0,.37-.12,.68-.36,.94-.24,.26-.53,.39-.87,.39h-2.48c-.09,0-.14,.05-.14,.15v1.43c0,.1,.05,.15,.14,.15h4.11c.13,0,.25,.05,.34,.15Zm-10.14-4.65c-.09,0-.14,.05-.14,.15v1.4c0,.1,.05,.15,.14,.15h8.18c.09,0,.14-.05,.14-.15v-1.4c0-.1-.05-.15-.14-.15h-8.18Zm8,10.81c.09,0,.14-.05,.14-.15v-2.09c0-.1-.05-.15-.14-.15h-5.8c-.09,0-.14,.05-.14,.15v2.09c0,.1,.05,.15,.14,.15h5.8Z"/><path class="cls-1" d="M31.01,4.34c.34,0,.63,.13,.87,.39s.36,.57,.36,.94v7.54c0,.37-.12,.68-.36,.94-.24,.26-.53,.39-.87,.39h-1.77c-.08,0-.11,.05-.11,.14v.6c0,.15-.05,.28-.15,.38-.1,.1-.22,.15-.35,.15s-.25-.05-.35-.15c-.09-.1-.14-.23-.14-.38V5.66c0-.37,.12-.68,.36-.94s.53-.39,.87-.39h1.65Zm.21,1.21c0-.1-.05-.15-.14-.15h-1.82c-.09,0-.14,.05-.14,.15v3.16c0,.1,.05,.15,.14,.15h1.82c.09,0,.14-.05,.14-.15v-3.16Zm-2.1,7.8c0,.1,.05,.15,.14,.15h1.82c.09,0,.14-.05,.14-.15v-3.31c0-.1-.05-.15-.14-.15h-1.82c-.09,0-.14,.05-.14,.15v3.31Zm11.66-5.01c.09,.1,.14,.22,.14,.37s-.05,.26-.14,.37c-.09,.1-.21,.15-.34,.15h-1.22c-.09,0-.14,.05-.14,.15v1.46c0,.1,.05,.15,.14,.15h1.06c.13,0,.25,.05,.34,.15,.09,.1,.14,.22,.14,.36s-.05,.26-.14,.37c-.09,.1-.21,.15-.34,.15h-1.06c-.09,0-.14,.05-.14,.15v4.04c0,.33-.04,.58-.13,.76s-.24,.32-.46,.41c-.32,.12-.93,.18-1.83,.18-.14,0-.27-.05-.4-.16-.12-.11-.21-.24-.26-.4-.05-.12-.04-.24,.03-.34s.16-.16,.28-.16c.35,0,.64,.02,.88,.02s.4,0,.53-.02c.12-.01,.21-.04,.25-.08,.04-.04,.06-.12,.06-.23v-4.03c0-.1-.05-.15-.14-.15h-4.87c-.13,0-.25-.05-.34-.15s-.14-.22-.14-.37,.05-.26,.14-.36,.21-.15,.34-.15h4.87c.09,0,.14-.05,.14-.15v-1.46c0-.1-.05-.15-.14-.15h-4.94c-.13,0-.25-.05-.34-.15-.09-.1-.14-.22-.14-.37s.05-.26,.14-.37,.21-.15,.34-.15h3.02c.09,0,.14-.05,.14-.15v-1.68c0-.1-.05-.15-.14-.15h-2.4c-.13,0-.25-.05-.34-.15-.09-.1-.14-.22-.14-.36s.05-.26,.14-.37c.09-.1,.21-.15,.34-.15h2.4c.09,0,.14-.05,.14-.15v-1.15c0-.15,.05-.28,.16-.4,.1-.11,.23-.17,.38-.17s.27,.06,.38,.17c.1,.11,.16,.24,.16,.4v1.15c0,.1,.05,.15,.14,.15h2.5c.13,0,.25,.05,.34,.15s.14,.22,.14,.37-.05,.26-.14,.36-.21,.15-.34,.15h-2.5c-.09,0-.14,.05-.14,.15v1.68c0,.1,.05,.15,.14,.15h3.12c.13,0,.25,.05,.34,.15Zm-7.02,5.16c-.08-.1-.1-.22-.08-.36,.02-.14,.08-.24,.18-.3,.13-.08,.27-.11,.42-.09s.27,.09,.38,.2c.52,.61,.95,1.2,1.28,1.77,.08,.14,.09,.29,.06,.45-.04,.16-.12,.28-.26,.37-.12,.08-.25,.1-.39,.06-.14-.04-.24-.13-.32-.26-.34-.62-.76-1.24-1.26-1.85Z"/><path class="cls-1" d="M43.95,15.26c-.34,0-.63-.13-.87-.39-.24-.26-.36-.57-.36-.94v-3.46s-.01-.06-.04-.08c-.02-.02-.05-.03-.09-.02-.23,.06-.45,.12-.68,.18-.13,.03-.26,.01-.4-.05-.13-.07-.23-.17-.3-.3-.04-.06-.06-.13-.06-.2,0-.04,0-.09,.03-.14,.04-.11,.11-.18,.21-.2,1.43-.33,2.43-.77,3.01-1.34,.02-.01,.02-.03,.01-.06,0-.03-.03-.05-.06-.05h-1.8s-.03,.01-.03,.03c-.05,.12-.13,.18-.25,.17l-.31-.02c-.12-.01-.21-.07-.28-.18s-.07-.23-.04-.35c.09-.22,.18-.48,.27-.76,.12-.37,.33-.67,.63-.9,.3-.23,.63-.35,1-.35h1.52c.09,0,.14-.05,.14-.15v-.6c0-.1-.05-.15-.14-.15h-3.05c-.1,0-.19-.04-.25-.11-.07-.07-.1-.16-.1-.27s.03-.2,.1-.27c.07-.08,.15-.11,.25-.11h3.11c.06,0,.09-.03,.09-.09v-.23c0-.15,.05-.28,.14-.38,.09-.1,.21-.15,.35-.15s.25,.05,.35,.15c.09,.1,.14,.23,.14,.38v.23c0,.06,.03,.09,.08,.09h2.07c.06,0,.08-.03,.08-.09v-.21c0-.15,.05-.28,.15-.39,.1-.11,.22-.16,.36-.16s.26,.05,.36,.16c.1,.11,.15,.24,.15,.39v.21c0,.06,.02,.09,.07,.09h2.01c.31,0,.58,.12,.8,.36,.22,.24,.33,.52,.33,.85s-.11,.62-.33,.85c-.22,.24-.49,.36-.8,.36h-1.94c-.09,0-.14,.05-.14,.15v.53c0,.1,.05,.15,.14,.15h2.77c.34,0,.62,.13,.85,.4,.17,.2,.26,.43,.26,.69,0,.08,0,.16-.03,.24-.07,.34-.16,.57-.28,.7-.16,.17-.4,.27-.71,.29h-.2c-.09,0-.14,.05-.14,.15v4.01c0,.37-.12,.68-.36,.94-.24,.26-.53,.39-.87,.39h-6.92Zm.72,.4c.17-.08,.33-.12,.5-.12s.32,.04,.48,.12c.09,.04,.14,.12,.15,.24s-.04,.2-.13,.24c-.97,.5-2.13,.94-3.46,1.33-.08,.03-.17,.05-.25,.05-.25,0-.47-.11-.67-.34-.06-.07-.08-.15-.08-.23,0-.03,0-.06,.01-.09,.03-.12,.1-.19,.21-.21,1.3-.28,2.38-.62,3.25-.99Zm-1.45-9.05c-.09,0-.16,.05-.18,.14l-.18,.56s0,.06,.01,.09c.02,.03,.05,.05,.08,.05h1.89c.1,0,.17-.05,.2-.14,.07-.17,.11-.36,.13-.55,0-.04-.01-.08-.04-.11-.02-.03-.06-.05-.11-.05h-1.8Zm7.66,4.53c.09,0,.14-.05,.14-.15v-.67c0-.1-.05-.15-.14-.15h-6.98c-.09,0-.14,.05-.14,.15v.67c0,.1,.05,.15,.14,.15h6.98Zm0,1.68c.09,0,.14-.05,.14-.15v-.66c0-.1-.05-.15-.14-.15h-6.98c-.09,0-.14,.05-.14,.15v.66c0,.1,.05,.15,.14,.15h6.98Zm0,1.69c.09,0,.14-.05,.14-.15v-.66c0-.1-.05-.15-.14-.15h-6.98c-.09,0-.14,.05-.14,.15v.66c0,.1,.05,.15,.14,.15h6.98Zm1.6-6.15s0-.08-.02-.11c-.02-.03-.05-.05-.09-.05h-2.82c-.07,0-.1,.04-.1,.12v.5c0,.15-.05,.28-.15,.39-.1,.11-.22,.16-.36,.16s-.26-.05-.36-.16c-.1-.11-.15-.24-.15-.39v-.5c0-.08-.04-.12-.11-.12h-2.41c-.08,0-.16,.05-.21,.14-.22,.38-.52,.71-.89,.99-.02,.01-.03,.03-.02,.05s.02,.03,.05,.03h6.26s.04-.02,.03-.05c-.03-.09-.01-.18,.04-.26,.06-.08,.13-.12,.21-.12,.28,.02,.49,.03,.61,.03,.09,0,.17-.01,.21-.03,.09-.02,.16-.08,.2-.18,.04-.1,.07-.25,.1-.44Zm-4.2-.92c.09,0,.14-.05,.14-.15v-.53c0-.1-.05-.15-.14-.15h-1.97c-.09,0-.15,.05-.16,.15,0,.17-.03,.36-.07,.55,0,.03,0,.06,.02,.09,.02,.03,.05,.05,.09,.05h2.09Zm-1.96-2.5c-.09,0-.14,.05-.14,.15v.6c0,.1,.05,.15,.14,.15h1.96c.09,0,.14-.05,.14-.15v-.6c0-.1-.05-.15-.14-.15h-1.96Zm2.64,11.25c-.11-.04-.17-.13-.17-.26,0-.08,.04-.15,.11-.2,.19-.13,.39-.2,.61-.2,.1,0,.21,.02,.31,.05,1.11,.34,2.21,.72,3.32,1.16,.12,.05,.18,.15,.18,.29,0,.11-.05,.2-.16,.26-.2,.1-.4,.15-.61,.15-.18,0-.36-.04-.55-.12-.84-.36-1.86-.73-3.05-1.13Zm2.72-11.1c0-.1-.05-.15-.14-.15h-1.96c-.09,0-.14,.05-.14,.15v.6c0,.1,.05,.15,.14,.15h1.96c.09,0,.14-.05,.14-.15v-.6Z"/><path class="cls-1" d="M64.72,4.08c.34,0,.63,.13,.87,.39,.24,.26,.36,.57,.36,.94V15.66c0,.38-.05,.66-.15,.85-.1,.19-.27,.34-.5,.44-.35,.13-1.06,.2-2.14,.2-.15,0-.29-.05-.42-.16s-.22-.25-.28-.42c-.05-.13-.04-.25,.04-.37s.17-.17,.29-.17c.44,.01,1.02,.02,1.72,.02,.26,0,.38-.15,.38-.41v-3.01c0-.1-.05-.15-.14-.15h-3.62c-.09,0-.14,.05-.14,.15v3.88c0,.16-.05,.3-.16,.41-.1,.11-.23,.17-.38,.17s-.28-.06-.38-.17c-.1-.11-.16-.25-.16-.41v-3.88c0-.1-.05-.15-.14-.15h-3.35c-.09,0-.15,.05-.16,.15-.24,1.74-.72,3.15-1.46,4.23-.09,.12-.2,.19-.35,.19-.15,0-.27-.04-.38-.15-.11-.1-.18-.23-.2-.38v-.09c0-.12,.03-.23,.1-.34,.34-.51,.61-1.09,.82-1.76,.27-.86,.44-1.63,.5-2.3s.08-1.45,.08-2.36V5.4c0-.37,.12-.68,.36-.94,.24-.26,.53-.39,.87-.39h8.1Zm-8.33,7.14s0,.08,.03,.11c.03,.03,.06,.05,.1,.05h3.25c.09,0,.14-.05,.14-.15v-2.29c0-.1-.05-.15-.14-.15h-3.19c-.09,0-.14,.05-.14,.15v.76c0,.54-.01,1.05-.04,1.53Zm3.52-5.89c0-.1-.05-.15-.14-.15h-3.19c-.09,0-.14,.05-.14,.15v2.2c0,.1,.05,.15,.14,.15h3.19c.09,0,.14-.05,.14-.15v-2.2Zm4.84,2.35c.09,0,.14-.05,.14-.15v-2.2c0-.1-.05-.15-.14-.15h-3.62c-.09,0-.14,.05-.14,.15v2.2c0,.1,.05,.15,.14,.15h3.62Zm-3.76,3.54c0,.1,.05,.15,.14,.15h3.62c.09,0,.14-.05,.14-.15v-2.29c0-.1-.05-.15-.14-.15h-3.62c-.09,0-.14,.05-.14,.15v2.29Z"/></g></svg>';
    }
}