"use strict";

import users from '../fixtures/users.json';

export default (  username : string, password : string ) =>
    users.find( user => user.username === username && user.password === password )