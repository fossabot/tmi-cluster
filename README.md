# TMI Cluster for Laravel

## Introduction

TMI Cluster is a Laravel package that smoothly enables a highly scalable IRC client cluster for Twitch. TMI Cluster consists of multiple supervisors that can be deployed on multiple hosts. The core is inspired by [Horizon](https://github.com/laravel/horizon), which handles the complex IRC process management.

The cluster stores its data in the database and has a Redis Command Queue to send IRC commands and receive messages.

## Features

- Supervisor can be deployed on multiple servers
- Up-to-date Twitch IRC Client written in PHP 7.4
- Scalable message input/output queue

## PHP Twitch Messaging Interface

The TMI Cluster is powered by the [PHP Twitch Messaging Interface](https://github.com/ghostzero/tmi) client to communicate with Twitch. It's a full featured, high performance Twitch IRC client written in PHP 7.4. 

## Official Documentation

Our Documentation is currently still work in progress.
