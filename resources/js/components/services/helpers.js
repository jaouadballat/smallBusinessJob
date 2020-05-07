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
