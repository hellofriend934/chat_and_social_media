/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';



const app = createApp({});

import indexChat from "./components/chat/IndexChat.vue";
import VideoChatComponent from "./components/VideoChatComponent.vue";
import NotificationComponent from "./components/NotificationComponent.vue";

app.component('index-chat',indexChat)
app.component('video-chat-component',VideoChatComponent)
app.component('notification-component', NotificationComponent)
app.mount('#app');
