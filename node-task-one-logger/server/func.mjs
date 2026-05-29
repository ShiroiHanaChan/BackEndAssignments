import fs from 'node:fs';

export default async function handleForm( data ) {
    console.log('Processing: ', data);
    const date = [ new Date( Date.now() ).toString(), '\n' ].join('');

    try {
        fs.appendFile( 'service.txt', [data, date ].join(' - '), _ => {} );
        console.log('Writing ', data);
        return {
            status: 200,
            message: `Successfully written ${data} to file!`
        }
    } catch (error) {
        return {
            status: 400,
            message: `Error ${error}`
        }
    }
}