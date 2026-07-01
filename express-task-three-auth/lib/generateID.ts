"use strict";

import crypto from 'crypto';

export default function () {
    // 6 bytes = 48 bits < 2**53, safe to fit in JS Number
    const buf = crypto.randomBytes(6);
    return buf.readUIntBE(0, 6); // returns a Number
}