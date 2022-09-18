import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler.js'

import SpotMainPhoto from './vue/admin/spot/edit/MainPhoto.vue'
import SpotAssociateCompany from './vue/admin/spot/edit/AssociateCompany.vue'
import UserAssociateCompanies from './vue/admin/user/edit/AssociateCompanies.vue'
import UserAssociateSpots from './vue/admin/user/edit/AssociateSpots.vue'

const app = createApp({})
app.component('spot-main-photo', SpotMainPhoto);
app.component('spot-associate-company', SpotAssociateCompany);
app.component('user-associate-companies', UserAssociateCompanies);
app.component('user-associate-spots', UserAssociateSpots);
app.mount('#app')

