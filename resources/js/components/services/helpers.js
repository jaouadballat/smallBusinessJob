export const imageLink = link => `${window.location.origin}/${link}`;
export const getUrlParams = () => new URLSearchParams(window.location.search);

export const getFilterFromUrlParams = () => {
    const params = getUrlParams()
    const filter = {};
    params.forEach((value, key) => {
        filter[key] = value;
    });
    return filter;
}

export const appendParamsToUrl = (key, value) => {
    const params = getUrlParams();
    params.set([key], value);
    window.history.pushState(null, null, constructUrlParams(params));
}

export const valueFromUrlParams = key => getUrlParams().get([key])


const constructUrlParams = params => {
    let filter = '';
    const urlKeys = Array.from(params.keys());
    const urlValues = Array.from(params.values());
    for (let i = 0; i < urlKeys.length; i++) {

        if(i === 0) {
            filter += `?${urlKeys[i]}=${urlValues[i]}`;
        } else if(!_.isEmpty(urlValues[i])) {
            filter += `&${urlKeys[i]}=${urlValues[i]}`;
        }
    }

    return filter;
}

export function debounce(func, timeout) {
    let timer;

    return (...args) => {
      const next = () => func(...args);

      if (timer) {
        clearTimeout(timer);
      }

      timer = setTimeout(next, timeout > 0 ? timeout : 300);
    };
  }


