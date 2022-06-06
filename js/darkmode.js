function darkmode() {
    if (document.cookie.indexOf('dark') >  1) {
        console.log (document.cookie.indexOf('dark'));
        document.documentElement.style.setProperty('--bluebackgroundcolor', '#05386B');
        document.documentElement.style.setProperty('--blackorwhitebackground', 'white');
        document.documentElement.style.setProperty('--blackorwhitetextcolor', '#282828');
        document.documentElement.style.setProperty('--tab', 'whitesmoke');
        document.documentElement.style.setProperty('--imagefilterallwayswhite', 'invert(97%) sepia(0%) saturate(7461%) hue-rotate(54deg) brightness(111%) contrast(101%)');
        document.documentElement.style.setProperty('--imagefilterallwaysblack', 'invert(0%) sepia(90%) saturate(0%) hue-rotate(295deg) brightness(100%) contrast(101%)');
        document.documentElement.style.setProperty('--imagefilterblack', 'invert(0%) sepia(90%) saturate(0%) hue-rotate(295deg) brightness(100%) contrast(101%)');
        document.documentElement.style.setProperty('--imagefilterwhite', 'invert(97%) sepia(0%) saturate(7461%) hue-rotate(54deg) brightness(111%) contrast(101%)');
        document.documentElement.style.setProperty('--imagefilterblue', 'invert(20%) sepia(34%) saturate(2363%) hue-rotate(185deg) brightness(89%) contrast(105%)');
        document.cookie = "mode=light; path=/;";

    }
    else {
    document.documentElement.style.setProperty('--bluebackgroundcolor', '#05386B');
    document.documentElement.style.setProperty('--blackorwhitebackground', '#282828');
    document.documentElement.style.setProperty('--blackorwhitetextcolor', 'white');
    document.documentElement.style.setProperty('--tab', '#1e1e1e');
    document.documentElement.style.setProperty('--imagefilterallwayswhite', 'invert(97%) sepia(0%) saturate(7461%) hue-rotate(54deg) brightness(111%) contrast(101%)');
    document.documentElement.style.setProperty('--imagefilterallwaysblack', 'invert(0%) sepia(90%) saturate(0%) hue-rotate(295deg) brightness(100%) contrast(101%)');
    document.documentElement.style.setProperty('--imagefilterwhite', 'invert(0%) sepia(90%) saturate(0%) hue-rotate(295deg) brightness(100%) contrast(101%)');
    document.documentElement.style.setProperty('--imagefilterblack', 'invert(97%) sepia(0%) saturate(7461%) hue-rotate(54deg) brightness(111%) contrast(101%)');
    document.documentElement.style.setProperty('--imagefilterblue', 'invert(20%) sepia(34%) saturate(2363%) hue-rotate(185deg) brightness(89%) contrast(105%)');
    console.log("test")
    document.cookie = "mode=dark; path=/; ";
    }
}