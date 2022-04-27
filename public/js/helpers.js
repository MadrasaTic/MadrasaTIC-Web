
export async function sendJSON(url, uploadData) {
    try {
        const resp = await fetch(url, {
            method: "POST",
            headers: {
                "Content-type": "application/json",
            },
            body: JSON.stringify(uploadData)
        });
        const data = await resp.json();
        if (!resp.ok) console("The request failed");
        return data;
    } catch (err) {
        throw(err);
    }
}

export async function getJSON(url) {
    try {
        const response = await fetch(url);
        const data = await response.json();

        if (!response.ok) throw new Error(`${data.message} (${response.status})`);
        return data;
    
    } catch (err) {
        throw err; 
    }
    }