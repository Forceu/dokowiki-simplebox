# Simple Box Plugin For Dokuwiki

A plugin that adds support for displaying boxes in various sizes and colors with text.
This can be used for example for tracking of content in stacked containers.

## Syntax

```
{{simplebox>BOX_COLOR|size=BOX_SIZE|content=BOX_CONTENT}}
{{simplebox-linebreak}}
```

Replace `BOX_COLOR` with a color code, `BOX_SIZE` with the size and `BOX_CONTENT` with the content.

### Example


```
{{simplebox>lightgreen|size=80|content=1}}
{{simplebox>lightgray|size=80|content=2}}
{{simplebox-linebreak}}
{{simplebox>lightblue|size=80|content=3}}
{{simplebox>#ffabad|size=80|content=4}}

```

![image](https://github.com/Forceu/dokowiki-simplebox/assets/1593467/b24883bb-c858-4930-b0d7-ccfc7f43c47c)
