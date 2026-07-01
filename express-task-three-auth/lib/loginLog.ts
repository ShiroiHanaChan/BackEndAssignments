"use strict";

import * as fs from 'fs/promises';

export default async ( user : string, route : string = '/', method : string ) : Promise<void> => {
    const date = [ new Date( Date.now() ).toString(), '\n', '\n' ].join('');
    await fs.appendFile(
        'logins.txt',
        [ user, route, method, date ].join( ' - ' ),
        'utf8'
    );
}