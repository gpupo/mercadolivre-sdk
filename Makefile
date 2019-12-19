# This file has settings for the Make of this project.
# Targets must exist in the bin/make-file/targets/ directory.

.SILENT:
CURRENT_DIR := $(shell pwd)

#CommonSdk
include vendor/gpupo/common-sdk/bin/make-file/variables.mk
include vendor/gpupo/common-sdk/bin/make-file/define.mk
include vendor/gpupo/common-sdk/bin/make-file/functions/*
include vendor/gpupo/common-sdk/bin/make-file/targets/*

## Include custom Targets:
# include bin/make-file/variables.mk
# include bin/make-file/define.mk
#
# include bin/make-file/functions/*.mk
# include bin/make-file/targets/*.mk
