export const imageLink = link => `${window.location.origin}/${link}`;
export const getUrlParams = () => new URLSearchParams(window.location.search)
export const urlWithParams = page => {
    const params = getUrlParams();
    params.set('page', page)

    window.history.pushState(null, null, `?${params.toString()}`)
    return getFilterFromUrlParams(params);
}

export const getFilterFromUrlParams = params => {
    const filter = {};
    params.forEach((value, key) => {
        filter[key] = value;
    });
    return filter;
}

export const categoryFromUrl = (category) => {
    const params = getUrlParams();
    params.append('category', category);
    window.history.pushState(null, null, constructUrlParams(params));
}


const constructUrlParams = params => {
    let filter = '';
    const urlKeys = Array.from(params.keys());
    const urlValues = Array.from(params.values());
    for (let i = 0; i < urlKeys.length; i++) {

        if(i === 0) {
            filter += `?${urlKeys[i]}=${urlValues[i]}`;
        } else {
            filter += `&${urlKeys[i]}=${urlValues[i]}`;
        }
    }

    return filter;
}
