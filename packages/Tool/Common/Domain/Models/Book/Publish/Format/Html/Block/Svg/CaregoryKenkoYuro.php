<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Block\Svg;

/**
 * カテゴリ
 * category_k_yuro
 */
class CategoryKenkoYuro
{
    public function getTag(): string
    {
        return '<img class="svg" src="' . $this->getData() . '">';
    }

    public function getData(): string
    {
        return '<?xml version="1.0" encoding="UTF-8"?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47.01 77.98"><defs><style>.cls-1{fill:#fff;}</style></defs><path class="cls-1" d="M29.03,.66c.06-.19,.18-.33,.36-.43s.37-.12,.56-.07,.34,.17,.43,.35,.11,.36,.05,.55c-.42,1.23-.89,2.44-1.41,3.61-.05,.11-.07,.22-.07,.33v15.89c0,.2-.07,.38-.21,.52s-.31,.21-.5,.21-.36-.07-.5-.21-.21-.31-.21-.52V7.8s-.01-.03-.04-.04-.04,0-.06,.01c-.53,.91-1.06,1.7-1.59,2.39-.12,.17-.29,.24-.49,.21s-.35-.13-.45-.3c-.11-.23-.16-.45-.16-.66,0-.28,.1-.55,.3-.82,1.64-2.16,2.97-4.8,3.98-7.95Zm4.95,7.88c.38,0,.66,.02,.87,.05,.12,.03,.22,.1,.29,.2s.11,.21,.11,.34c-.31,3.16-.91,5.76-1.8,7.8-.03,.11-.02,.21,.05,.3,.77,.94,1.71,1.6,2.84,1.98s2.5,.57,4.12,.57c2.72,0,4.65,0,5.79-.02,.17,0,.3,.07,.4,.22s.11,.31,.05,.48c-.08,.22-.2,.4-.38,.54s-.38,.21-.61,.21h-5.3c-1.78,0-3.28-.19-4.5-.57s-2.25-1.06-3.09-2.03c-.08-.08-.15-.07-.21,.02-.58,.97-1.23,1.79-1.97,2.46-.12,.11-.27,.16-.42,.16h-.09c-.19-.03-.34-.12-.47-.28-.11-.14-.16-.3-.16-.47,0-.22,.08-.4,.23-.54,.75-.67,1.41-1.55,1.97-2.62,.06-.11,.06-.21,0-.3-.58-1.08-1.08-2.48-1.5-4.2-.03-.19,0-.36,.09-.52s.23-.27,.4-.33c.17-.05,.33-.03,.48,.06s.24,.21,.27,.39c.28,1.17,.6,2.17,.96,3,.02,.03,.04,.05,.08,.05s.06-.02,.06-.05c.59-1.58,1.02-3.41,1.27-5.51,.02-.11-.04-.16-.16-.16h-1.88c-.09,0-.16,.04-.21,.12l-.19,.42c-.09,.17-.23,.3-.41,.39s-.36,.11-.55,.06c-.17-.03-.3-.13-.38-.29s-.08-.32,0-.48c.97-2.06,1.95-4.28,2.93-6.66,.02-.03,.01-.07-.01-.11s-.05-.06-.08-.06h-1.8c-.19,0-.35-.07-.48-.2s-.2-.29-.2-.48,.07-.35,.2-.48,.29-.2,.48-.2h2.67c.16-.05,.31-.05,.47,0l.28,.07c.14,.03,.24,.11,.3,.25s.07,.26,.02,.39c-.81,1.97-1.66,3.92-2.55,5.86-.02,.03-.01,.07,.01,.11s.06,.06,.11,.06h1.62Zm11.55-3.56c0,.11,.05,.16,.16,.16h.68c.17,0,.32,.06,.45,.19s.19,.28,.19,.46-.06,.33-.19,.46-.27,.19-.45,.19h-.68c-.11,0-.16,.05-.16,.16v1.71c0,.38-.14,.7-.41,.97s-.6,.41-.97,.41h-2.81c-.12,0-.19,.05-.19,.16v1.59c0,.12,.06,.19,.19,.19h3.87c.17,0,.32,.06,.45,.19s.19,.27,.19,.45-.06,.32-.19,.45-.27,.19-.45,.19h-3.87c-.12,0-.19,.06-.19,.19v1.64c0,.11,.06,.16,.19,.16h4.57c.17,0,.32,.06,.45,.19s.19,.27,.19,.45-.06,.32-.19,.45-.27,.19-.45,.19h-4.57c-.12,0-.19,.06-.19,.19v1.92c0,.2-.07,.38-.21,.52s-.31,.21-.5,.21-.36-.07-.5-.21-.21-.31-.21-.52v-1.92c0-.12-.06-.19-.19-.19h-3.94c-.17,0-.32-.06-.45-.19s-.19-.27-.19-.45,.06-.32,.19-.45,.27-.19,.45-.19h3.94c.12,0,.19-.05,.19-.16v-1.64c0-.12-.06-.19-.19-.19h-3.19c-.17,0-.32-.06-.45-.19s-.19-.27-.19-.45,.06-.32,.19-.45,.27-.19,.45-.19h3.19c.12,0,.19-.06,.19-.19v-1.59c0-.11-.06-.16-.19-.16h-2.79c-.17,0-.32-.06-.45-.19s-.19-.27-.19-.45,.06-.32,.19-.43,.27-.18,.45-.18h2.79c.12,0,.19-.06,.19-.19v-1.66c0-.11-.06-.16-.19-.16h-4.41c-.17,0-.32-.06-.45-.19s-.19-.28-.19-.46,.06-.33,.19-.46,.27-.19,.45-.19h4.41c.12,0,.19-.05,.19-.16v-1.59c0-.12-.06-.19-.19-.19h-2.79c-.17,0-.32-.06-.45-.19s-.19-.27-.19-.45,.06-.32,.19-.45,.27-.19,.45-.19h2.79c.12,0,.19-.05,.19-.16V.73c0-.2,.07-.38,.21-.52s.31-.21,.5-.21,.36,.07,.5,.21,.21,.31,.21,.52V1.76c0,.11,.06,.16,.19,.16h2.81c.38,0,.7,.14,.97,.41s.41,.6,.41,.97v1.66Zm-4.2-1.78c-.12,0-.19,.06-.19,.19v1.59c0,.11,.06,.16,.19,.16h2.62c.11,0,.16-.05,.16-.16v-1.59c0-.12-.05-.19-.16-.19h-2.62Zm2.62,5.25c.11,0,.16-.06,.16-.19v-1.66c0-.11-.05-.16-.16-.16h-2.62c-.12,0-.19,.05-.19,.16v1.66c0,.12,.06,.19,.19,.19h2.62Z"/><path class="cls-1" d="M46.33,31.53c.14,.14,.21,.31,.21,.52s-.07,.38-.21,.52-.31,.21-.52,.21H28.47c-.12,0-.19,.05-.19,.16v5.46c0,5.23-.64,9.22-1.92,11.95-.08,.17-.21,.28-.41,.32s-.38,0-.55-.11-.3-.27-.38-.47c-.02-.09-.02-.18-.02-.26,0-.11,.02-.23,.07-.35,1.16-2.48,1.73-6.18,1.73-11.09v-5.7c0-.38,.14-.7,.41-.97s.6-.41,.97-.41h7.34c.12,0,.19-.05,.19-.16v-1.22c0-.23,.08-.43,.23-.59s.35-.23,.57-.23,.42,.08,.57,.23,.23,.35,.23,.59v1.22c0,.11,.06,.16,.19,.16h8.3c.2,0,.38,.07,.52,.21Zm-12.09,15.05c.16-.05,.31-.03,.46,.05s.24,.2,.27,.35c.05,.17,.03,.34-.06,.49s-.21,.27-.36,.33c-.48,.19-1.27,.5-2.36,.95s-1.89,.77-2.4,.97c-.2,.08-.41,.08-.61,.01s-.36-.2-.47-.39c-.06-.09-.09-.2-.09-.3,0-.06,.02-.13,.05-.21,.06-.19,.19-.3,.38-.35,.98-.34,2.72-.98,5.2-1.9Zm10.17-5.67c0,.39-.14,.72-.41,.98s-.6,.4-.97,.4h-4.41s-.08,.02-.11,.06-.03,.07-.01,.11c.44,1.06,1,2.03,1.69,2.91,.06,.09,.15,.12,.26,.07,1.17-.72,2.23-1.45,3.16-2.18,.17-.12,.37-.19,.6-.2s.43,.06,.6,.2c.16,.11,.23,.26,.22,.46s-.09,.35-.25,.46c-1.19,.83-2.36,1.55-3.52,2.18-.11,.05-.12,.12-.02,.21,.59,.58,1.25,1.09,1.97,1.54s1.49,.82,2.32,1.11c.17,.06,.28,.18,.33,.35s0,.34-.12,.49c-.14,.19-.32,.32-.54,.4s-.44,.08-.66,0c-2.89-1.19-5.09-3.23-6.59-6.12,0-.03-.01-.04-.04-.04s-.04,.03-.04,.06v4.71c0,.52-.07,.9-.22,1.15s-.4,.43-.76,.54c-.53,.16-1.6,.23-3.21,.23-.2,0-.39-.07-.57-.21s-.31-.31-.39-.52c-.06-.17-.05-.33,.05-.47s.23-.21,.4-.21c.45,.02,.87,.02,1.24,.02,.58,0,1.04-.02,1.38-.05,.23,0,.39-.03,.47-.09s.12-.2,.12-.4v-6.59c0-.12-.06-.19-.19-.19h-5.11c-.17,0-.31-.06-.42-.18s-.16-.25-.16-.41,.05-.29,.16-.41,.25-.18,.42-.18h5.11c.12,0,.19-.06,.19-.19v-1.69c0-.11-.06-.16-.19-.16h-6.66c-.17,0-.32-.06-.43-.18s-.18-.26-.18-.43,.06-.32,.18-.43,.26-.18,.43-.18h6.66c.12,0,.19-.06,.19-.19v-1.55c0-.11-.06-.16-.19-.16h-4.97c-.17,0-.31-.06-.42-.18s-.16-.26-.16-.42,.05-.3,.16-.41,.25-.16,.42-.16h4.97c.12,0,.19-.06,.19-.19v-.84c0-.2,.07-.38,.21-.53s.32-.22,.53-.22,.39,.07,.54,.22,.22,.32,.22,.53v.84c0,.12,.06,.19,.19,.19h4.95c.38,0,.7,.13,.97,.4s.41,.59,.41,.98v1.5c0,.12,.05,.19,.16,.19h1.62c.17,0,.32,.06,.43,.18s.18,.26,.18,.43-.06,.32-.18,.43-.26,.18-.43,.18h-1.62c-.11,0-.16,.05-.16,.16v1.66Zm-14.23,2.98c-.14-.09-.22-.22-.23-.38s.03-.29,.14-.4c.19-.17,.38-.26,.56-.26,.14,0,.29,.05,.45,.14,.95,.56,1.79,1.14,2.51,1.73,.14,.11,.21,.26,.22,.45s-.05,.35-.19,.49-.29,.21-.48,.21-.35-.06-.49-.19c-.75-.62-1.58-1.23-2.48-1.8Zm7.9-7.92c-.12,0-.19,.05-.19,.16v1.55c0,.12,.06,.19,.19,.19h4.64c.11,0,.16-.06,.16-.19v-1.55c0-.11-.05-.16-.16-.16h-4.64Zm0,3.12c-.12,0-.19,.05-.19,.16v1.69c0,.12,.06,.19,.19,.19h4.64c.11,0,.16-.06,.16-.19v-1.69c0-.11-.05-.16-.16-.16h-4.64Z"/><path class="cls-1" d="M36.81,76.32c0,.11,.05,.16,.16,.16h8.91c.2,0,.38,.07,.53,.22s.22,.32,.22,.53-.07,.38-.22,.53-.32,.22-.53,.22H25.8c-.2,0-.38-.07-.53-.22s-.22-.32-.22-.53,.07-.38,.22-.53,.32-.22,.53-.22h9.23c.11,0,.16-.05,.16-.16v-2.88c0-.12-.05-.19-.16-.19h-6.75c-.2,0-.38-.07-.52-.21s-.21-.31-.21-.52,.07-.38,.21-.52,.31-.21,.52-.21h6.75c.11,0,.16-.06,.16-.19v-1.85c0-.22,.08-.41,.23-.56s.35-.23,.57-.23,.42,.08,.57,.23,.23,.34,.23,.56v1.85c0,.12,.05,.19,.16,.19h6.42c.2,0,.38,.07,.52,.21s.21,.31,.21,.52-.07,.38-.21,.52-.31,.21-.52,.21h-6.42c-.11,0-.16,.06-.16,.19v2.88Zm-3.54-11.91c0-.12-.05-.19-.16-.19h-2.86c-.12,0-.2,.06-.21,.19-.34,2.19-1.32,3.91-2.93,5.18-.17,.12-.36,.18-.57,.15s-.39-.11-.55-.27c-.14-.14-.2-.31-.19-.5s.1-.36,.26-.48c1.34-1.03,2.16-2.39,2.46-4.08,.03-.12-.02-.19-.14-.19h-2.09c-.19,0-.35-.07-.49-.21s-.21-.31-.21-.5,.07-.36,.21-.5,.3-.21,.49-.21h2.2c.12,0,.19-.06,.19-.19v-3.07c0-.12-.06-.19-.19-.19h-1.41c-.2,0-.37-.07-.5-.2s-.2-.3-.2-.49,.07-.36,.2-.5,.3-.21,.5-.21h9.33c.2,0,.37,.07,.5,.21s.2,.31,.2,.5-.07,.36-.2,.49-.3,.2-.5,.2h-1.45c-.11,0-.16,.06-.16,.19v3.07c0,.12,.05,.19,.16,.19h1.92c.2,0,.38,.07,.52,.21s.21,.31,.21,.5-.07,.36-.21,.5-.31,.21-.52,.21h-1.92c-.11,0-.16,.06-.16,.19v4.29c0,.22-.07,.4-.22,.54s-.33,.21-.54,.21-.39-.07-.54-.21-.22-.32-.22-.54v-4.29Zm-3.12-1.83v.02c0,.12,.06,.19,.19,.19h2.77c.11,0,.16-.06,.16-.19v-3.07c0-.12-.05-.19-.16-.19h-2.77c-.12,0-.19,.06-.19,.19v3.05Zm9.25-4.07c.15-.15,.32-.22,.53-.22s.38,.07,.52,.22,.21,.32,.21,.53v6.49c0,.2-.07,.38-.21,.52s-.31,.21-.52,.21-.38-.07-.53-.21-.22-.31-.22-.52v-6.49c0-.2,.07-.38,.22-.53Zm4.45-1.22c.15-.15,.33-.22,.54-.22s.39,.07,.54,.22,.22,.33,.22,.55v10.01c0,.47-.06,.82-.18,1.05s-.35,.41-.69,.54c-.47,.17-1.39,.27-2.77,.28-.22,0-.42-.07-.6-.21s-.32-.32-.41-.54c-.06-.17-.04-.33,.06-.48s.24-.22,.41-.22c.45,.02,.84,.02,1.15,.02,.5,0,.84-.02,1.03-.05,.2-.02,.33-.05,.39-.09s.08-.16,.08-.33v-9.98c0-.22,.07-.4,.22-.55Z"/><path class="cls-1" d="M21.09,3.18c.14,.15,.21,.33,.21,.54s-.07,.39-.21,.54-.32,.22-.54,.22H8.53c-.11,0-.2,.05-.26,.14-.42,.91-.88,1.78-1.36,2.62-.03,.03-.04,.07-.01,.11s.05,.06,.08,.06h10.12c.38,0,.7,.13,.97,.4s.41,.59,.41,.98v10.83c0,.5-.07,.88-.22,1.15s-.4,.46-.76,.59c-.48,.17-1.59,.27-3.33,.28-.23,0-.45-.07-.63-.22s-.33-.34-.42-.57c-.06-.19-.04-.36,.07-.52s.26-.23,.45-.23c.47,.02,1.37,.02,2.7,.02,.22-.02,.37-.06,.46-.14s.13-.2,.13-.38v-2.48c0-.12-.05-.19-.16-.19H6.82c-.11,0-.16,.06-.16,.19v3.8c0,.2-.08,.38-.23,.54s-.34,.23-.55,.23-.39-.08-.55-.23-.23-.34-.23-.54V10.08s-.01-.05-.04-.07-.04,0-.06,.02c-1.06,1.31-2.19,2.44-3.38,3.38-.19,.12-.39,.17-.6,.14s-.39-.13-.53-.3c-.12-.14-.19-.3-.19-.49,0-.23,.09-.42,.28-.56,2.39-1.83,4.38-4.35,5.98-7.57,.02-.03,.01-.06-.01-.09s-.06-.05-.11-.05H1.24c-.2,0-.38-.07-.53-.22s-.22-.33-.22-.54,.07-.39,.22-.54,.32-.22,.53-.22H7.12c.11,0,.19-.05,.23-.16,.3-.72,.55-1.44,.77-2.16,.06-.22,.2-.39,.4-.52,.14-.08,.29-.12,.45-.12,.06,0,.12,0,.19,.02,.22,.05,.38,.16,.49,.35s.12,.39,.05,.61c-.2,.62-.41,1.23-.63,1.8-.02,.05-.01,.09,.01,.12s.06,.05,.11,.05h11.37c.22,0,.4,.07,.54,.22Zm-4.34,8.29c.11,0,.16-.06,.16-.19v-2.27c0-.11-.05-.16-.16-.16H6.82c-.11,0-.16,.05-.16,.16v2.27c0,.12,.05,.19,.16,.19h9.94Zm-10.1,3.89c0,.12,.05,.19,.16,.19h9.94c.11,0,.16-.06,.16-.19v-2.34c0-.11-.05-.16-.16-.16H6.82c-.11,0-.16,.05-.16,.16v2.34Z"/><path class="cls-1" d="M5.65,38.13c-.11,0-.16,.06-.16,.19v.02c0,.12,.04,.23,.12,.33,.72,.88,1.73,2.23,3.02,4.05,.14,.2,.2,.42,.19,.66s-.1,.45-.26,.63c-.12,.14-.29,.2-.48,.18s-.34-.12-.43-.29c-.42-.73-1.11-1.86-2.06-3.38-.02-.02-.04-.02-.06-.01s-.04,.02-.04,.04v9.19c0,.2-.07,.38-.22,.53s-.32,.22-.53,.22-.38-.07-.53-.22-.22-.32-.22-.53v-9.21s0-.02-.02-.02-.02,0-.02,.02c-.88,2.45-1.83,4.49-2.86,6.12-.11,.16-.26,.23-.46,.22s-.34-.11-.43-.29c-.12-.22-.19-.44-.19-.66,0-.27,.09-.52,.28-.77,.59-.86,1.18-1.91,1.77-3.15s1.07-2.46,1.46-3.67c0-.05-.01-.09-.04-.13s-.06-.06-.11-.06H.84c-.2,0-.38-.07-.53-.21s-.22-.31-.22-.52,.07-.38,.22-.53,.32-.22,.53-.22H3.82c.11,0,.16-.06,.16-.19v-7.03c0-.2,.07-.38,.22-.53s.32-.22,.53-.22,.38,.07,.53,.22,.22,.32,.22,.53v7.03c0,.12,.05,.19,.16,.19h3.05c.2,0,.38,.07,.53,.22s.22,.32,.22,.53-.07,.38-.22,.52-.32,.21-.53,.21h-3.05Zm-2.84-3.4c.03,.19,0,.36-.11,.52s-.25,.26-.43,.3c-.17,.05-.33,.02-.47-.08s-.23-.24-.26-.41c-.19-1.25-.53-2.59-1.03-4.01-.06-.16-.05-.31,.02-.46s.2-.24,.35-.27c.17-.05,.34-.03,.49,.05s.27,.2,.33,.38c.5,1.3,.87,2.62,1.1,3.98Zm5.02-3.96c.05-.19,.15-.33,.32-.43s.34-.12,.53-.07,.33,.17,.42,.34,.11,.35,.05,.54c-.61,1.84-1.12,3.23-1.52,4.15-.06,.16-.16,.27-.3,.33s-.29,.06-.45,0c-.14-.05-.24-.14-.3-.27s-.07-.27-.02-.41c.48-1.3,.91-2.69,1.29-4.17Zm13.95,11.62s.02,.09,.02,.12c0,.16-.05,.3-.14,.45-.12,.17-.29,.27-.49,.3l-2.23,.4c-.11,.02-.16,.09-.16,.21v5.86c0,.2-.07,.38-.22,.53s-.33,.22-.54,.22-.39-.07-.54-.22-.22-.32-.22-.53v-5.58c0-.12-.05-.17-.16-.14l-6.66,1.2c-.22,.03-.41-.01-.57-.13s-.27-.28-.32-.48v-.14c0-.16,.04-.3,.12-.42,.12-.17,.29-.28,.49-.33l6.94-1.24c.11-.02,.16-.09,.16-.21v-12.87c0-.2,.07-.38,.22-.53s.33-.22,.54-.22,.39,.07,.54,.22,.22,.32,.22,.53v12.63c0,.12,.05,.17,.16,.14l2.02-.35c.2-.05,.39-.01,.55,.11s.25,.28,.27,.48Zm-7.52-3.82c.17,.14,.27,.32,.3,.54s-.02,.42-.14,.61c-.09,.16-.24,.25-.43,.27s-.36-.03-.5-.15c-.77-.66-1.72-1.33-2.86-2.02-.16-.09-.25-.23-.29-.4s-.01-.34,.08-.49c.11-.16,.25-.26,.43-.3s.36-.02,.53,.07c1.17,.64,2.13,1.27,2.88,1.88Zm1.15-5.77c.14,.16,.22,.34,.23,.55s-.03,.4-.14,.57c-.11,.16-.26,.24-.45,.26s-.34-.05-.47-.19c-.73-.72-1.64-1.45-2.72-2.18-.14-.09-.23-.23-.26-.41s0-.34,.09-.48c.12-.16,.28-.25,.46-.29s.36,0,.53,.11c1.08,.69,1.98,1.38,2.72,2.06Z"/></svg>';
    }
}