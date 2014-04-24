<?php echo $header ?>

<div class="content manager">

  <header class="manager__header">
    <h1 class="alpha">Manage all users</h1>
    <a class="manager__toggle" ui-sref="users.modal.add"><i class="fa fa-plus-circle"></i> <span>Add a new user</span></a>
  </header>

  <div class="users">
    <article class="user" ng-repeat="user in users">
      <figure class="user__avatar">
        <a ui-sref="users.modal.avatar({username: user.username})">
          <img ng-show="user.avatar" ng-src="{{user.avatar}}">
          <i ng-show="!user.avatar" class="fa fa-user fa-lg"></i>
        </a>
      </figure>

      <strong class="user__username">{{user.username}}</strong>
      <small class="user__email">{{user.email}}</small>

      <nav class="manager__options user__options">
        <a ui-sref="users.modal.edit({username : user.username})">
          <i class="fa fa-pencil"></i> edit
        </a><!--
     --><a ui-sref="users.modal.delete({username : user.username})">
          <i class="fa fa-trash-o"></i> delete
        </a>
      </nav>

    </article>
  </div>


</div>