"use strict";

import { IncomingMessage, ServerResponse } from 'http';

export interface Request extends IncomingMessage {
    body?: Body;
}

export interface Response extends ServerResponse {
    json?: ( statusCode : number, data : Data ) => void;
}