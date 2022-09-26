export const MultiSelectClasses = {
    container:
        "relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded bg-white text-base leading-snug outline-none",
    containerDisabled: "cursor-default bg-gray-100",
    containerOpen: "rounded-b-none",
    containerOpenTop: "rounded-t-none",
    containerActive: "ring ring-green-500 ring-opacity-30",
    singleLabel:
        "flex items-center h-full max-w-full absolute left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5 pr-16 box-border rtl:left-auto rtl:right-0 rtl:pl-0 rtl:pr-3.5",
    singleLabelText:
        "overflow-ellipsis overflow-hidden block whitespace-nowrap max-w-full",
    multipleLabel:
        "flex items-center h-full absolute left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5 rtl:left-auto rtl:right-0 rtl:pl-0 rtl:pr-3.5",
    search: "w-full absolute inset-0 outline-none focus:ring-0 appearance-none box-border border-0 text-base font-sans bg-white rounded pl-3.5 rtl:pl-0 rtl:pr-3.5",
    tags: "flex-grow flex-shrink flex flex-wrap items-center mt-1 pl-2 rtl:pl-0 rtl:pr-2",
    tag: "bg-green-500 text-white text-sm font-semibold py-0.5 pl-2 rounded mr-1 mb-1 flex items-center whitespace-nowrap rtl:pl-0 rtl:pr-2 rtl:mr-0 rtl:ml-1",
    tagDisabled: "pr-2 opacity-50 rtl:pl-2",
    tagRemove:
        "flex items-center justify-center p-1 mx-0.5 rounded-sm hover:bg-black hover:bg-opacity-10 group",
    tagRemoveIcon:
        "bg-multiselect-remove bg-center bg-no-repeat opacity-30 inline-block w-3 h-3 group-hover:opacity-60",
    tagsSearchWrapper:
        "inline-block relative mx-1 mb-1 flex-grow flex-shrink h-full",
    tagsSearch:
        "absolute inset-0 border-0 outline-none focus:ring-0 appearance-none p-0 text-base font-sans box-border w-full",
    tagsSearchCopy: "invisible whitespace-pre-wrap inline-block h-px",
    placeholder:
        "flex items-center h-full absolute left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5 text-gray-400 rtl:left-auto rtl:right-0 rtl:pl-0 rtl:pr-3.5",
    caret: "bg-multiselect-caret bg-center bg-no-repeat w-2.5 h-4 py-px box-content mr-3.5 relative z-10 opacity-40 flex-shrink-0 flex-grow-0 transition-transform transform pointer-events-none rtl:mr-0 rtl:ml-3.5",
    caretOpen: "rotate-180 pointer-events-auto",
    clear: "pr-3.5 relative z-10 opacity-40 transition duration-300 flex-shrink-0 flex-grow-0 flex hover:opacity-80 rtl:pr-0 rtl:pl-3.5",
    clearIcon:
        "bg-multiselect-remove bg-center bg-no-repeat w-2.5 h-4 py-px box-content inline-block",
    spinner:
        "bg-multiselect-spinner bg-center bg-no-repeat w-4 h-4 z-10 mr-3.5 animate-spin flex-shrink-0 flex-grow-0 rtl:mr-0 rtl:ml-3.5",
    inifite: "flex items-center justify-center w-full",
    inifiteSpinner:
        "bg-multiselect-spinner bg-center bg-no-repeat w-4 h-4 z-10 animate-spin flex-shrink-0 flex-grow-0 m-3.5",
    dropdown:
        "max-h-60 absolute -left-px -right-px bottom-0 transform translate-y-full border border-gray-300 -mt-px overflow-y-scroll z-50 bg-white flex flex-col rounded-b",
    dropdownTop:
        "-translate-y-full top-px bottom-auto rounded-b-none rounded-t",
    dropdownHidden: "hidden",
    options: "flex flex-col p-0 m-0 list-none",
    optionsTop: "",
    group: "p-0 m-0",
    groupLabel:
        "flex text-sm box-border items-center justify-start text-left py-1 px-3 font-semibold bg-gray-200 cursor-default leading-normal",
    groupLabelPointable: "cursor-pointer",
    groupLabelPointed: "bg-gray-300 text-gray-700",
    groupLabelSelected: "bg-green-600 text-white",
    groupLabelDisabled: "bg-gray-100 text-gray-300 cursor-not-allowed",
    groupLabelSelectedPointed: "bg-green-600 text-white opacity-90",
    groupLabelSelectedDisabled:
        "text-green-100 bg-green-600 bg-opacity-50 cursor-not-allowed",
    groupOptions: "p-0 m-0",
    option: "flex items-center justify-start box-border text-left cursor-pointer text-base leading-snug py-2 px-3",
    optionPointed: "text-gray-800 bg-gray-100",
    optionSelected: "text-white bg-green-500",
    optionDisabled: "text-gray-300 cursor-not-allowed",
    optionSelectedPointed: "text-white bg-green-500 opacity-90",
    optionSelectedDisabled:
        "text-green-100 bg-green-500 bg-opacity-50 cursor-not-allowed",
    noOptions: "py-2 px-3 text-gray-600 bg-white text-left",
    noResults: "py-2 px-3 text-gray-600 bg-white text-left",
    fakeInput:
        "bg-transparent absolute left-0 right-0 -bottom-px w-full h-px border-0 p-0 appearance-none outline-none text-transparent",
    spacer: "h-9 py-px box-content",
};

// export const MultiSelectClasses = {
//     container:
//         "relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-300 rounded bg-white text-base leading-snug outline-none",
//     containerDisabled: "cursor-default bg-gray-100",
//     containerOpen: "rounded-b-none",
//     containerOpenTop: "rounded-t-none",
//     containerActive: "ring ring-teal-500 ring-opacity-30",
//     singleLabel:
//         "flex items-center h-full max-w-full absolute left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5 pr-16 box-border rtl:left-auto rtl:right-0 rtl:pl-0 rtl:pr-3.5",
//     singleLabelText:
//         "overflow-ellipsis overflow-hidden block whitespace-nowrap max-w-full",
//     multipleLabel:
//         "flex items-center h-full absolute left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5 rtl:left-auto rtl:right-0 rtl:pl-0 rtl:pr-3.5",
//     search: "w-full absolute inset-0 outline-none focus:ring-0 appearance-none box-border border-0 text-base font-sans bg-white rounded pl-3.5 rtl:pl-0 rtl:pr-3.5",
//     tags: "flex-grow flex-shrink flex flex-wrap items-center mt-1 pl-2 rtl:pl-0 rtl:pr-2",
//     tag: "bg-teal-500 text-white text-sm font-semibold py-0.5 pl-2 rounded mr-1 mb-1 flex items-center whitespace-nowrap rtl:pl-0 rtl:pr-2 rtl:mr-0 rtl:ml-1",
//     tagDisabled: "pr-2 opacity-50 rtl:pl-2",
//     tagRemove:
//         "flex items-center justify-center p-1 mx-0.5 rounded-sm hover:bg-black hover:bg-opacity-10 group",
//     tagRemoveIcon:
//         "bg-multiselect-remove bg-center bg-no-repeat opacity-30 inline-block w-3 h-3 group-hover:opacity-60",
//     tagsSearchWrapper:
//         "inline-block relative mx-1 mb-1 flex-grow flex-shrink h-full",
//     tagsSearch:
//         "absolute inset-0 border-0 outline-none focus:ring-0 appearance-none p-0 text-base font-sans box-border w-full",
//     tagsSearchCopy: "invisible whitespace-pre-wrap inline-block h-px",
//     placeholder:
//         "flex items-center h-full absolute left-0 top-0 pointer-events-none bg-transparent leading-snug pl-3.5 text-gray-400 rtl:left-auto rtl:right-0 rtl:pl-0 rtl:pr-3.5",
//     caret: "bg-multiselect-caret bg-center bg-no-repeat w-2.5 h-4 py-px box-content mr-3.5 relative z-10 opacity-40 flex-shrink-0 flex-grow-0 transition-transform transform pointer-events-none rtl:mr-0 rtl:ml-3.5",
//     caretOpen: "rotate-180 pointer-events-auto",
//     clear: "pr-3.5 relative z-10 opacity-40 transition duration-300 flex-shrink-0 flex-grow-0 flex hover:opacity-80 rtl:pr-0 rtl:pl-3.5",
//     clearIcon:
//         "bg-multiselect-remove bg-center bg-no-repeat w-2.5 h-4 py-px box-content inline-block",
//     spinner:
//         "bg-multiselect-spinner bg-center bg-no-repeat w-4 h-4 z-10 mr-3.5 animate-spin flex-shrink-0 flex-grow-0 rtl:mr-0 rtl:ml-3.5",
//     inifite: "flex items-center justify-center w-full",
//     inifiteSpinner:
//         "bg-multiselect-spinner bg-center bg-no-repeat w-4 h-4 z-10 animate-spin flex-shrink-0 flex-grow-0 m-3.5",
//     dropdown:
//         "max-h-60 w-full absolute -left-px -right-px bottom-0 transform translate-y-full border border-gray-300 -mt-px overflow-y-scroll z-50 bg-white flex flex-col rounded-b",
//     dropdownTop:
//         "-translate-y-full top-px bottom-auto rounded-b-none rounded-t",
//     dropdownHidden: "hidden",
//     options: "flex flex-col p-0 m-0 list-none",
//     optionsTop: "",
//     group: "p-0 m-0",
//     groupLabel:
//         "flex text-sm box-border items-center justify-start text-left py-1 px-3 font-semibold bg-gray-200 cursor-default leading-normal",
//     groupLabelPointable: "cursor-pointer",
//     groupLabelPointed: "bg-gray-300 text-gray-700",
//     groupLabelSelected: "bg-teal-600 text-white",
//     groupLabelDisabled: "bg-gray-100 text-gray-300 cursor-not-allowed",
//     groupLabelSelectedPointed: "bg-teal-600 text-white opacity-90",
//     groupLabelSelectedDisabled:
//         "text-teal-100 bg-teal-600 bg-opacity-50 cursor-not-allowed",
//     groupOptions: "p-0 m-0",
//     option: "flex items-center justify-start box-border text-left cursor-pointer text-base leading-snug py-2 px-3",
//     optionPointed: "text-gray-800 bg-gray-100",
//     optionSelected: "text-white bg-teal-500",
//     optionDisabled: "text-gray-300 cursor-not-allowed",
//     optionSelectedPointed: "text-white bg-teal-500 opacity-90",
//     optionSelectedDisabled:
//         "text-teal-100 bg-teal-500 bg-opacity-50 cursor-not-allowed",
//     noOptions: "py-2 px-3 text-gray-600 bg-white text-left",
//     noResults: "py-2 px-3 text-gray-600 bg-white text-left",
//     fakeInput:
//         "bg-transparent absolute left-0 right-0 -bottom-px w-full h-px border-0 p-0 appearance-none outline-none text-transparent",
//     spacer: "h-9 py-px box-content",
// };
